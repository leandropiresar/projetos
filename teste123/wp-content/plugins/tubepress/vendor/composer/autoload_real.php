<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit00cd452709c9e2cbe0c8885edbb893fa
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require dirname(__FILE__) . '/ClassLoader.php';
        }
    }

    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit00cd452709c9e2cbe0c8885edbb893fa', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader();
        spl_autoload_unregister(array('ComposerAutoloaderInit00cd452709c9e2cbe0c8885edbb893fa', 'loadClassLoader'));

        $vendorDir = dirname(dirname(__FILE__));
        $baseDir = dirname($vendorDir);

        $includePaths = require dirname(__FILE__) . '/include_paths.php';
        array_push($includePaths, get_include_path());
        set_include_path(join(PATH_SEPARATOR, $includePaths));

        $map = require dirname(__FILE__) . '/autoload_namespaces.php';
        foreach ($map as $namespace => $path) {
            $loader->set($namespace, $path);
        }

        $classMap = require dirname(__FILE__) . '/autoload_classmap.php';
        if ($classMap) {
            $loader->addClassMap($classMap);
        }

        $loader->register(true);

        return $loader;
    }
}
