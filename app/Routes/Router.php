<?php

namespace App\Routes;

/**
 * Cette classe Router va stocker les routes dans un tableau
 */
class Router
{

    private $url;
    private $routes = [];

    public function __construct(string $url)
    {
        $this->url = trim($url, '/');
    }

    /**
     * Undocumented function
     *
     * @param string $path
     * @param array|string $action
     * @return void
     */
    public function get(string $path, $action)
    {
        $this->routes['GET'][] = new Route($path, $action);
    }

    /**
     * Undocumented function
     *
     * @param string $path
     * @param array|string $action
     * @return void
     */
    public function post(string $path, $action)
    {
        $this->routes['POST'][] = new Route($path, $action);
    }

    /**
     * Undocumented function
     *
     * @param string $path
     * @param array|string $action
     * @return void
     */
    public function put(string $path, $action)
    {
        $this->routes['PUT'][] = new Route($path, $action);
    }

    /**
     * Undocumented function
     *
     * @param string $path
     * @param array|string $action
     * @return void
     */
    public function delete(string $path, $action)
    {
        $this->routes['DELETE'][] = new Route($path, $action);
    }

    public function run()
    {
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if($route->matches($this->url)) {
                return $route->execute();
            }
        }
        return header('HTTP/1.0 404 Not Found');
    }



}