<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GraphAware\Neo4j\Client\ClientBuilder;
use GraphAware\Neo4j\Client\Client;

class Neo4jServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Client::class, function() {
            return ClientBuilder::create()
                ->addConnection('default', getenv('NEO4J_HOST'))
                ->build();
        });
    }
}
