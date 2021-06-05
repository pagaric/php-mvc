<?php

namespace App\Controllers;

use App\Config\Config;

abstract class Controller
{
    protected $config;

    public function __construct()
    {
        $this->config = new Config(CONFIG);
    }

    protected function view(string $path, array $params = null)
    {
        ob_start();

        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS .$path. '.html.php';
        
        $content = ob_get_clean();

        require VIEWS .'layout.html.php';
    }
}