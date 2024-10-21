<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitacc6ad9a21a039ba4efe45add33ca4ba
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitacc6ad9a21a039ba4efe45add33ca4ba', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitacc6ad9a21a039ba4efe45add33ca4ba', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitacc6ad9a21a039ba4efe45add33ca4ba::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
