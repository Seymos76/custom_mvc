<?php


namespace App\Core\Install;


use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class RoutesLoader
{
    /**
     * @param RouteCollection ...$routes
     * @return RouteCollection
     */
    public static function getRoutes(RouteCollection ...$routes): RouteCollection
    {
        $newRoute = new RouteCollection();
//        dump('get route func',$newRoute);
        /** @var RouteCollection $routeCollection */
        foreach ($routes as $routeCollection) {
//            dump('routeCollection:',$routeCollection);
            /**
             * @var string $routeName
             * @var Route $route
             */
            foreach ($routeCollection as $routeName => $route) {
//                dump('routeName:',$routeName);
//                dump('route:',$route);
                $newRoute->add($routeName, $route);
            }
        }
        return $newRoute;
    }
}