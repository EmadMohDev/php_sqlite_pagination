<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit66bbc8bfc8036405feeb966da577dd51
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit66bbc8bfc8036405feeb966da577dd51::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit66bbc8bfc8036405feeb966da577dd51::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit66bbc8bfc8036405feeb966da577dd51::$classMap;

        }, null, ClassLoader::class);
    }
}