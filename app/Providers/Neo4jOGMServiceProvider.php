<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GraphAware\Neo4j\OGM\EntityManager;

class Neo4jOGMServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(EntityManager::class, function() {
            return EntityManager::create(getenv('NEO4J_HOST'));
        });
    }
}
