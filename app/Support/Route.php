<?php
namespace Ecogolf\Support;

/**
 * route declaration wrapper
 */
class Route
{

    protected static $app;


    /**
     * route set up references Slim\App
     *
     * @param [type] $app
     * @return void
     */
    public static function setUp(&$app) {
        self::$app = $app;
        return $app;
    }


    /**
     * static call 
     *
     * @param [type] $varbs
     * @param [type] $arguments
     * @return void
     */
    public static function __callStatic($verb, $arguments)
    {
        $app = self::$app;

        /**
         * destructure $app->get('/route',controller::class . ':action')
         */
        [$route,$action] = $arguments;

        self::validate($route,$verb,$action);

        return is_callable($action) ? $app->$verb($route,$action) : $app->$verb($route,self::resolveController($action));

    }

    public static function resolveController($action) {
        //to do => add definition 'controller@action';
        return $action;
    }

    public static function validate($route,$verb,$action) {

        $exception = 'Unresolvable Route Callback/Controller action';

        //send debug to front-end
        $context = json_encode(compact('route','action','verb'));

        $fails = !((is_callable($action)) || is_string($action));

        if($fails) {
            throw new \Exception($exception);
        }
    }


}

