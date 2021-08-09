<?php

namespace BinomeWay\NovaTaxonomiesTool;

use BinomeWay\NovaTaxonomiesTool\Http\Middleware\Authorize;
use Illuminate\Support\Facades\Route;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ToolServiceProvider extends PackageServiceProvider
{

    public function configurePackage(Package $package): void
    {
        $package
            ->name('nova-taxonomies-tool')
            ->hasMigration('create_taxonomies_tables')
            ->hasViews()
        ;
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function packageBooted()
    {
       // $this->loadViewsFrom(__DIR__ . '/../resources/views', 'nova-taxonomies-tool');

        $this->app->booted(function () {
            $this->routes();
        });

        /*Nova::serving(function (ServingNova $event) {
            //
        });*/
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', Authorize::class])
            ->prefix('nova-vendor/nova-taxonomies-tool')
            ->group(__DIR__ . '/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function packageRegistered()
    {
        $this->app->singleton(Taxonomies::class);
    }
}
