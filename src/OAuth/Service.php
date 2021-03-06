<?php

namespace EONConsulting\PHPSaasWrapper\OAuth;

use EONConsulting\PHPSaasWrapper\Models\ServiceAvailable;
use EONConsulting\PHPSaasWrapper\Models\ServiceLinked;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Illuminate\Http\Request;

/**
 * Class Service
 * @package EONConsulting\PHPSaasWrapper\OAuth
 */
class Service {

    public $key;
    protected $client;
    public $client_id;
    protected $secret;
    public $redirect_uri;
    protected $adapter;
    public $return_uri;
    public $access_token_uri;
    public $auth_url;
    protected $auth_response;
    protected $access_token;

    /**
     * Service constructor.
     * @param ServiceAdapter $adapter
     */
    public function __construct(ServiceAdapter $adapter) {
        $this->adapter = $adapter;
        $this->set_data();
    }

    /**
     * Set the data
     */
    public function set_data() {
        $this->key = $this->adapter->key;
        $this->client_id = $this->adapter->client_id;
        $this->secret = $this->adapter->secret;
        $this->redirect_uri = $this->adapter->redirect_uri;
        $this->return_uri = $this->adapter->return_uri;
        $this->access_token_uri = $this->adapter->access_token_uri;
        $this->auth_url = $this->adapter->auth_url;

        $this->client = new Client;
    }

    /**
     * Get the Authorize URL
     * @return mixed
     */
    public function getAuthorizeUrl() {
        return $this->auth_url;
    }

    /**
     * Authorize the User
     * @param Request $request
     * @return bool|mixed
     */
    public function authorize(Request $request) {

        $code = '';

        if($request->has("code")) {
            $code = $request->get('code');
        }

        $secret = $this->secret;

        $response = $this->client->request('GET', $this->access_token_uri, [
            'query' => [
                'client_id' => $this->client_id,
                'client_secret' => $secret,
                'redirect_uri' => $this->return_uri,
                'code' => $code,
                'state' => session('return_url'),
            ],
            'headers' => [
                'accept' => 'application/json',
            ]
        ])->getBody();

        $response = json_decode($response);
        $this->auth_response = $response;

        $service = ServiceAvailable::where('service_key', $this->key)->select('service_id')->first();

        if(key_exists('access_token', $response)) {
            $this->access_token = $response->access_token;

            if($service) {
                ServiceLinked::where('service_id', $service->service_id)->update(['active' => 0]);
                ServiceLinked::create(['service_id' => $service->service_id, 'active' => 1, 'token' => $response->access_token]);
            }

            return true;
        }

        $linked = ServiceLinked::where('service_id', $service->service_id)->where('active', 1)->first();
        if(!$linked) {
            return $this->getAuthorizeUrl();
        }

        return false;

    }

    /**
     * Get the Client ID
     * @return mixed
     */
    public function getClientId() {
        return $this->client_id;
    }

    /**
     * Set the Client ID
     * @param mixed $client_id
     */
    public function setClientId($client_id) {
        $this->client_id = $client_id;
    }

    /**
     * Get the Secret
     * @return mixed
     */
    private function getSecret() {
        return $this->secret;
    }

    /**
     * Set the Secret
     * @param mixed $secret
     */
    public function setSecret($secret) {
        $this->secret = $secret;
    }

    /**
     * Get the Redirect URI
     * @return mixed
     */
    public function getRedirectUri() {
        return $this->redirect_uri;
    }

    /**
     * Set the Redirect URI
     * @param mixed $redirect_uri
     */
    public function setRedirectUri($redirect_uri) {
        $this->redirect_uri = $redirect_uri;
    }

    /**
     * Get the Return URI
     * @return mixed
     */
    public function getReturnUri() {
        return $this->return_uri;
    }

    /**
     * Set the Return URI
     * @param mixed $return_uri
     */
    public function setReturnUri($return_uri) {
        $this->return_uri = $return_uri;
    }

    /**
     * Get the Client
     * @return mixed
     */
    public function getClient() {
        return $this->client;
    }

    /**
     * Set the Client
     * @param mixed $client
     */
    public function setClient($client) {
        $this->client = $client;
    }

    /**
     * Get the Adapter
     * @return ServiceAdapter
     */
    public function getAdapter() {
        return $this->adapter;
    }

    /**
     * Set the Adapter
     * @param ServiceAdapter $adapter
     */
    public function setAdapter($adapter) {
        $this->adapter = $adapter;
    }


}