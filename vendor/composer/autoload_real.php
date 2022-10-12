<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit93f7968b5a426e5714cc4f8b0cbbd539
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

        spl_autoload_register(array('ComposerAutoloaderInit93f7968b5a426e5714cc4f8b0cbbd539', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit93f7968b5a426e5714cc4f8b0cbbd539', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit93f7968b5a426e5714cc4f8b0cbbd539::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}