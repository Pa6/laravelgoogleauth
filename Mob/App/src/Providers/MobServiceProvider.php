<?php
namespace Mob\Providers;
use Illuminate\Support\ServiceProvider;

use Illuminate\Container\Container as App;
use Mob\Classes\MobUsers;

/**
 * Created by PhpStorm.
 * User: pa6
 * Date: 09/03/2017
 * Time: 12:06
 */
class MobServiceProvider extends ServiceProvider
{

    public function boot(){}

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Users
        $this->app->bind('mob_users',function(App $app){
            return new MobUsers($app);
        });
    }
}