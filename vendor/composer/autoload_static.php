<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3c0908a8219a98bf5a91d7d161727861
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SuperClosure\\' => 13,
            'Scheduler\\' => 10,
            'SchedulerTests\\' => 15,
        ),
        'R' => 
        array (
            'Recurr\\Test\\' => 12,
            'Recurr\\' => 7,
        ),
        'P' => 
        array (
            'PhpParser\\' => 10,
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'D' => 
        array (
            'Doctrine\\Deprecations\\' => 22,
            'Doctrine\\DBAL\\' => 14,
            'Doctrine\\Common\\Collections\\' => 28,
            'Doctrine\\Common\\Cache\\' => 22,
            'Doctrine\\Common\\' => 16,
        ),
        'C' => 
        array (
            'Cron\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SuperClosure\\' => 
        array (
            0 => __DIR__ . '/..' . '/jeremeamia/superclosure/src',
        ),
        'Scheduler\\' => 
        array (
            0 => __DIR__ . '/..' . '/hutnikau/job-scheduler/src',
        ),
        'SchedulerTests\\' => 
        array (
            0 => __DIR__ . '/..' . '/hutnikau/job-scheduler/tests',
        ),
        'Recurr\\Test\\' => 
        array (
            0 => __DIR__ . '/..' . '/simshaun/recurr/tests',
        ),
        'Recurr\\' => 
        array (
            0 => __DIR__ . '/..' . '/simshaun/recurr/src/Recurr',
        ),
        'PhpParser\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/php-parser/lib/PhpParser',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Doctrine\\Deprecations\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/deprecations/lib/Doctrine/Deprecations',
        ),
        'Doctrine\\DBAL\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/dbal/lib/Doctrine/DBAL',
        ),
        'Doctrine\\Common\\Collections\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/collections/lib/Doctrine/Common/Collections',
        ),
        'Doctrine\\Common\\Cache\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/cache/lib/Doctrine/Common/Cache',
        ),
        'Doctrine\\Common\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/event-manager/src',
        ),
        'Cron\\' => 
        array (
            0 => __DIR__ . '/..' . '/mtdowling/cron-expression/src/Cron',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3c0908a8219a98bf5a91d7d161727861::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3c0908a8219a98bf5a91d7d161727861::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3c0908a8219a98bf5a91d7d161727861::$classMap;

        }, null, ClassLoader::class);
    }
}
