<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitad5b40a1bf0b6b27b4882cd008ed6543
{
    public static $files = array (
        'cde015ff707f294d6b597c39f8cf83c2' => __DIR__ . '/..' . '/wp-pure/twitter-aggregator/wordpress.php',
    );

    public static $classMap = array (
        'TwitterAPIExchange' => __DIR__ . '/..' . '/j7mbo/twitter-api-php/TwitterAPIExchange.php',
        'twitterAggregator' => __DIR__ . '/..' . '/wp-pure/twitter-aggregator/twitterAggregator.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitad5b40a1bf0b6b27b4882cd008ed6543::$classMap;

        }, null, ClassLoader::class);
    }
}