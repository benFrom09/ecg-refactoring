<?php
declare(strict_type=1);
namespace Ecogolf\Providers;

use Slim\App;
use Psr\Container\ContainerInterface;


abstract class ServiceProvider
{
    public App $app;

    public ContainerInterface $container;

    final public function __construct(App &$app) {
        $this->app = $app;
        $this->container = $app->getContainer();
    }

    abstract public function register();
    abstract public function boot();

    public function bind($key,callable $callable) {
        $this->container->set($key,$callable);
    }
    public function resolve($key) {
        return $this->container->get($key);
    }

    final public static function setUp(App &$app, array $providers) {

        $providers = array_map(fn($provider) => new $provider($app),$providers);

        array_walk($providers,fn(ServiceProvider $provider) => $provider->register());
        array_walk($providers,fn(ServiceProvider $provider) => $provider->boot());
    }
}