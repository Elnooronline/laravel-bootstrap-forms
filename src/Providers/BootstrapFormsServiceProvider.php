<?php

namespace Elnooronline\LaravelBootstrapForms\Providers;

use Elnooronline\LaravelBootstrapForms\BsForm;
use Illuminate\Support\ServiceProvider;
use Elnooronline\LaravelBootstrapForms\Helpers\FormDirectives;

class BootstrapFormsServiceProvider extends ServiceProvider
{
    /**
     * BsForm any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'BsForm');

        $this->publishes([
            __DIR__.'/../views' => resource_path('views/vendor/BsForm'),
        ], 'BsForm');

        FormDirectives::register();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('bootstrap.form', function () {
            return BsForm::getInstance();
        });
    }
}
