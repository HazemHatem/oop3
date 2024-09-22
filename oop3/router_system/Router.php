<?php
class Router
{
    private $routes = array();

    public function addRoute($method, $path, $controller, $action)
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'action' => $action,
        ];
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function route()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = trim($_SERVER['REQUEST_URI'], '/');

        foreach ($this->routes as $route) {
            if ($method === $route['method'] && $uri === $route['path']) {
                $controllerName = $route['controller'];
                $actionName = $route['action'];
                $controllerFile = 'controllers/' . $controllerName . '.php';
                if (file_exists($controllerFile)) {
                    require_once $controllerFile;
                    $controller = new $controllerName();
                    if (method_exists($controller, $actionName)) {
                        $controller->$actionName();
                        return;
                    } else {
                        http_response_code(404);
                        echo "Method not found.";
                        return;
                    }
                } else {
                    http_response_code(404);
                    echo "Controller not found.";
                    return;
                }
            }
        }
    }
}
