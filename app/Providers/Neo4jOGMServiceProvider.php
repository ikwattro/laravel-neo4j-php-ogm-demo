<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GraphAware\Neo4j\OGM\Manager;

class Neo4jOGMServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Manager::class, function() {
            return Manager::buildWithHost(getenv('NEO4J_HOST'));
        });
    }
}
