<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc7c00c4518bbeda34db6d97cdda04c07
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitc7c00c4518bbeda34db6d97cdda04c07::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc7c00c4518bbeda34db6d97cdda04c07::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc7c00c4518bbeda34db6d97cdda04c07::$classMap;

        }, null, ClassLoader::class);
    }
}
