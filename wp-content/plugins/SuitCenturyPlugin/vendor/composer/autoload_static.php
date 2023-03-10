<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit43439ee5b396cb0be2a32f9f351925e4
{
    public static $files = array (
        '2b006deba3017dcb6c01b9bde10e1c3c' => __DIR__ . '/../..' . '/app/Libraries/DB.php',
        '4ecf2cca5628180e9c60347ec8a8c53b' => __DIR__ . '/../..' . '/app/Libraries/SCWoocommerceApi.php',
        '4bd53c5e7d507e04e75d86895e469b72' => __DIR__ . '/../..' . '/app/Endpoints/SCLogin.php',
        'ddfbe5991506b7959affe0c133500f6e' => __DIR__ . '/../..' . '/app/Endpoints/SCRegister.php',
        'b2a0c663da6242d4943f9200f54e318a' => __DIR__ . '/../..' . '/app/Endpoints/SCEvents.php',
        '6695b91c70679897ded493abb9316fe0' => __DIR__ . '/../..' . '/app/Endpoints/SCEventsGet.php',
        'ce583c2746a4addeb2909c80db695196' => __DIR__ . '/../..' . '/app/Endpoints/SCGroups.php',
        '6fe2ccb2918708768ccab6a48c647b8b' => __DIR__ . '/../..' . '/app/Helpers/functions.php',
        'c764162d6c85a40960af5fa0db25d262' => __DIR__ . '/../..' . '/app/Migration/SC_Migration.php',
        '8c767eaa1984ba03b6bd6a3bc6a93022' => __DIR__ . '/../..' . '/app/Libraries/SCHash.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Automattic\\WooCommerce\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Automattic\\WooCommerce\\' => 
        array (
            0 => __DIR__ . '/..' . '/automattic/woocommerce/src/WooCommerce',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit43439ee5b396cb0be2a32f9f351925e4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit43439ee5b396cb0be2a32f9f351925e4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit43439ee5b396cb0be2a32f9f351925e4::$classMap;

        }, null, ClassLoader::class);
    }
}
