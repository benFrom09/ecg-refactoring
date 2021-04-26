<?php
namespace Ecogolf\Providers;

use Ecogolf\Support\Route;
use Ecogolf\Providers\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{

    public function register() {

        //set up Route

       Route::setUp($this->app);


    }

    public function boot() {
        //load routes definition files 
        require dirname(dirname(__DIR__)).'/routes/routes.php';
    }

}