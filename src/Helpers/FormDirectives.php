<?php

namespace Elnooronline\LaravelBootstrapForms\Helpers;

use Illuminate\Support\Str;

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
    }
}