<?php

namespace App\Providers;

use App\Search\ProviderManager;
use App\Search\SearchProvider1;
use App\Search\SearchProvider2;
use App\Search\SearchProvider3;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(ProviderManager::class, function ($app) {
            return new ProviderManager();
        });

        $providerManager = $this->app->make(ProviderManager::class);

        $provider_config = config('services.email_search');
        $apiKey = $provider_config['api_key'];

        $providerManager->addProvider(new SearchProvider1($provider_config['providers'][0], $apiKey));
        $providerManager->addProvider(new SearchProvider2($provider_config['providers'][1], $apiKey));
        $providerManager->addProvider(new SearchProvider3($provider_config['providers'][2], $apiKey));
    }
}
