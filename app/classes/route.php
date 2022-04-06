<?php

class route
{
    private static array $patterns = [
        ':id' => '([0-9]+)',
        ':url' => '([0-9a-zA-Z-_]+)'

    ];
    private static array $routes = [];
    private static bool $hasroute = false;

    public static function get($path, $callback)
    {
        self::$routes['get'][$path] = $callback;
    }

    public static function post($path, $callback)
    {
        self::$routes['post'][$path] = $callback;
    }

    public static function dispath()
    {
        $url = self::getUrl();
        $method = self::getMethod();

        foreach (self::$routes[$method] as $path => $callback) {
            foreach (self::$patterns as $key => $pattern) {
                $path = str_replace($key, $pattern, $path);
            }
            $patern = '@^' . $path . '$@';
            if (preg_match($patern, $url, $params)) {
                array_shift($params);
                self::$hasroute = true;
                if (is_callable($callback)) {
                    call_user_func_array($callback, $params);
                } elseif (is_string($callback)) {
                    [$controllerName, $methodName] = explode('@', $callback);
                    $controllerFile = PATH . '/app/controller/' . strtolower($controllerName . '.php');

                    require $controllerFile;
                    $controllerName = explode('/',$controllerName);
                    $controllerName = end($controllerName);
                    $controler = new $controllerName;
                    call_user_func_array([$controler, $methodName], $params);
                }
            }
        }
        self::hasRoute();
    }

    public static function getUrl(): string
    {
        return str_replace($_SERVER['SCRIPT_NAME'], null, $_SERVER['REQUEST_URI']);
    }

    public static function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    private static function hasRoute()
    {
        if (self::$hasroute === false) {
            header('location:404');
        }
    }

}