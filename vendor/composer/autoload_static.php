<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitad287b79bf53c2d8092f4cbc50553c32
{
    public static $files = array (
        '5255c38a0faeba867671b61dfda6d864' => __DIR__ . '/..' . '/paragonie/random_compat/lib/random.php',
        'c964ee0ededf28c96ebd9db5099ef910' => __DIR__ . '/..' . '/guzzlehttp/promises/src/functions_include.php',
        'a0edc8309cc5e1d60e3047b5df6b7052' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/functions_include.php',
        '72579e7bd17821bb1321b87411366eae' => __DIR__ . '/..' . '/illuminate/support/helpers.php',
        '37a3dc5111fe8f707ab4c132ef1dbc62' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/functions_include.php',
        'c226c25794146328500eabe7758865f0' => __DIR__ . '/../..' . '/src/Http/helpers.php',
        '9dc9121c30e42758e1c2f23369683161' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/functions.php',
        'c0c80413306c03cc819a9ad9f9f2f68d' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/functions.php',
        '814c9f07f6be90246958901b4c642c81' => __DIR__ . '/..' . '/guzzlehttp/promises/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tsugi\\' => 6,
        ),
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
        ),
        'I' => 
        array (
            'Illuminate\\Support\\' => 19,
            'Illuminate\\Contracts\\' => 21,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Psr7\\' => 16,
            'GuzzleHttp\\Promise\\' => 19,
            'GuzzleHttp\\' => 11,
        ),
        'E' => 
        array (
            'EONConsulting\\PHPSaasWrapper\\' => 29,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tsugi\\' => 
        array (
            0 => __DIR__ . '/..' . '/tsugi/lib/src',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Illuminate\\Support\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/support',
        ),
        'Illuminate\\Contracts\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/contracts',
        ),
        'GuzzleHttp\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/psr7/src',
        ),
        'GuzzleHttp\\Promise\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/promises/src',
        ),
        'GuzzleHttp\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/guzzle/src',
        ),
        'EONConsulting\\PHPSaasWrapper\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'D' => 
        array (
            'Doctrine\\Common\\Inflector\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/inflector/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitad287b79bf53c2d8092f4cbc50553c32::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitad287b79bf53c2d8092f4cbc50553c32::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitad287b79bf53c2d8092f4cbc50553c32::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
