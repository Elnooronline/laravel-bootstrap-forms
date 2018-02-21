<?php

namespace Elnooronline\LaravelBootstrapForms\Facades;

use Illuminate\Support\Facades\Facade;

class BsForm extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bootstrap.form';
    }
}