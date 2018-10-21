<?php
/**
 * Created by PhpStorm.
 * User: Clown
 * Date: 18/10/21
 * Time: 16:03
 */

namespace ErnestWang\Weather;


class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function register(){
        $this->app->singleton(Weather::class, function(){
            return new Weather(config('services.weather.key'));
        });

        $this->app->alias(Weather::class, 'weather');
    }

    public function provides()
    {
        return [Weather::class, 'weather'];
    }

}