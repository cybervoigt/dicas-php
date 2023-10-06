<?php

/**
 * laravel beer ad code
 */

class Request
{
    public string $uri;
    public string $method;
    public function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
    }
}

#[Attribute]
class Http
{
    public function __construct(
        public string $uri,
        public string $method
    )
    {
        
    }
}

class MyController
{
    #[Http(uri:'/myself', method: 'GET')]
    public function me()
    {
        return 'welcome to my nightmare...';
    }
}


class Router
{
    public function handle(Request $request)
    {
        $controller = new ReflectionClass(MyController::class);

        $methods = $controller->getMethods();

        foreach($methods as $method)
        {
            $attributes = $method->getAttributes();
            foreach($attributes as $attribute)
            {
                $uri = explode('/', $attribute->getArguments()['uri']);
                $RequestUri = explode('/', $request->uri);

                $http = explode('/', $attribute->getArguments()['method']);
                $RequestHttp = explode('/', $request->method);

                if($uri != $RequestUri and  $http != $RequestHttp)
                {
                    continue;
                }

                return $method->invoke(
                    $method->getDeclaringClass()->newInstance()
                );
            }
        }
        return "Route not found...";
    }
}


$req = new Request();

$router = new Router();

echo $router->handle($req);

