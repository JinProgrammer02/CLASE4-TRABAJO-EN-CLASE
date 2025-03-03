<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitad38c4396e96ea0c9f32417c9b16ef4c
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'XMLSchema' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'nusoap_base' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'nusoap_client' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'nusoap_client_mime' => __DIR__ . '/..' . '/econea/nusoap/src/nusoapmime.php',
        'nusoap_fault' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'nusoap_parser' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'nusoap_server' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'nusoap_server_mime' => __DIR__ . '/..' . '/econea/nusoap/src/nusoapmime.php',
        'nusoap_wsdlcache' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'nusoap_xmlschema' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'nusoapservermime' => __DIR__ . '/..' . '/econea/nusoap/src/nusoapmime.php',
        'soap_fault' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'soap_parser' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'soap_server' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'soap_transport_http' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'soapclient' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'soapclientmime' => __DIR__ . '/..' . '/econea/nusoap/src/nusoapmime.php',
        'soapval' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'wsdl' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'wsdlcache' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitad38c4396e96ea0c9f32417c9b16ef4c::$classMap;

        }, null, ClassLoader::class);
    }
}
