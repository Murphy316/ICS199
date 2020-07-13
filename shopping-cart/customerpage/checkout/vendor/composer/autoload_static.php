<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7302c43dbdc783935547ac7659e6c1ea
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7302c43dbdc783935547ac7659e6c1ea::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7302c43dbdc783935547ac7659e6c1ea::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
