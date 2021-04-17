<?php

namespace App\Providers;

use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\GitRepository;
use App\Http\Repositories\GitRepositoryInterface;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Http\Repositories\GitRepositoryInterface::class, function(){
            $client = new GuzzleClient(['base_uri' => 'https://api.github.com/search/repositories']);
            return new \App\Http\Repositories\GitRepository($client);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
