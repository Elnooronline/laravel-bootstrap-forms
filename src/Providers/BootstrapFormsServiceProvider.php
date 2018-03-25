<?php

namespace Elnooronline\LaravelBootstrapForms\Providers;

use Illuminate\Support\ServiceProvider;
use Elnooronline\LaravelBootstrapForms\BsForm;
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
        $this->loadViewsFrom($this->srcPath('views'), 'BsForm');

        $this->publishes([
            $this->srcPath('config/laravel-bootstrap-forms.php') => config_path('laravel-bootstrap-forms.php'),
        ]);

        $this->publishes([
            $this->srcPath('views') => resource_path('views/vendor/BsForm'),
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

        $this->mergeConfigFrom(
            $this->srcPath('config/laravel-bootstrap-forms.php'), 'laravel-bootstrap-forms'
        );
    }
    
    private function srcPath($path)
    {
        return __DIR__.'/../'.$path;
    }
}
