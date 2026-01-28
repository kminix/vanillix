<?php
declare(strict_types=1);

namespace App\Routing;

use App\Support\Request;
use App\Support\Response;

final class Router
{
    /** @var Route[] */
    private array $routes = [];

    public function get(string $path, array $handler): void
    {
        $this->add('GET', $path, $handler);
    }

    public function post(string $path, array $handler): void
    {
        $this->add('POST', $path, $handler);
    }

    public function add(string $method, string $path, array $handler): void
    {
        $this->routes[] = new Route(strtoupper($method), $path, $handler);
    }

    public function dispatch(Request $request): Response
    {
        $method = $request->method();
        $uri    = $request->uri();

        $allowedMethods = [];

        foreach ($this->routes as $route) {
            if ($this->matchPath($route->pathPattern, $uri, $params)) {
                if ($route->method !== $method) {
                    $allowedMethods[] = $route->method;
                    continue;
                }

                return $this->invokeHandler($route->handler, $request, $params);
            }
        }

        if (!empty($allowedMethods)) {
            $allowed = implode(', ', array_values(array_unique($allowedMethods)));
            return new Response('Method Not Allowed', 405, ['Allow' => $allowed]);
        }

        return new Response('Not Found', 404);
    }

    private function invokeHandler(array $handler, Request $request, array $params): Response
    {
        [$class, $method] = $handler;

        if (!class_exists($class)) {
            return new Response("Controller not found: {$class}", 500);
        }

        $controller = new $class();

        if (!method_exists($controller, $method)) {
            return new Response("Controller method not found: {$class}::{$method}", 500);
        }

        // Convention: controller method signature is (Request $request, array $params): Response
        $response = $controller->$method($request, $params);

        if (!$response instanceof Response) {
            return new Response('Controller must return a Response', 500);
        }

        return $response;
    }

    private function matchPath(string $pattern, string $uri, ?array &$paramsOut): bool
    {
        // Convert "/images/{id}" → regex with named capture group
        $regex = preg_replace('#\{([a-zA-Z_][a-zA-Z0-9_]*)\}#', '(?P<$1>[^/]+)', $pattern);
        $regex = '#^' . $regex . '$#';

        if (!preg_match($regex, $uri, $matches)) {
            $paramsOut = [];
            return false;
        }

        // Pull named matches only
        $params = [];
        foreach ($matches as $k => $v) {
            if (is_string($k)) {
                $params[$k] = $v;
            }
        }

        $paramsOut = $params;
        return true;
    }
}
