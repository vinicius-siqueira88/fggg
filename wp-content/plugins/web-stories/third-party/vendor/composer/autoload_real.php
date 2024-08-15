<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitd343a5a9ccab6123f4546ebbc7784fed
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Google_Web_Stories_Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Google_Web_Stories_Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitd343a5a9ccab6123f4546ebbc7784fed', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Google_Web_Stories_Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitd343a5a9ccab6123f4546ebbc7784fed', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Google_Web_Stories_Composer\Autoload\ComposerStaticInitd343a5a9ccab6123f4546ebbc7784fed::getInitializer($loader));

        $loader->setClassMapAuthoritative(true);
        $loader->register(true);

        return $loader;
    }
}
