<?php

namespace Elnooronline\LaravelBootstrapForms\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Blade;

class FormDirectives
{
    /**
     * Register all the form directives.
     *
     * @return void
     */
    public static function register()
    {
        collect(get_class_methods(RegisterFormDirectives::class))->each(function ($method) {
            if (Str::startsWith($method, 'register')) {
                (new RegisterFormDirectives())->{$method}();
            }
        });

        Blade::directive('eachlocale', function ($expression) {
            return "<?php foreach(['ar', 'en'] as \$locale): ?>";
        });

        Blade::directive('endeachlocale', function ($expression) {
            return "<?php endforeach; ?>";
        });

    }
}