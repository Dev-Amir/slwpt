<?php

class Autoloader
{
    public function __construct()
    {
        spl_autoload_register(array($this, 'autoload'));
    }

    public function autoload($class_name)
    {
        $file = $this->convert_class_to_file($class_name);

        require_once $file;
    }

    public function convert_class_to_file($class_name)
    {
        $class = strtolower($class_name);
        $class = 'class-' . $class;
        $fileName = $class . '.php';
        return 'classes' . DIRECTORY_SEPARATOR . $fileName;
    }
}

new Autoloader();
