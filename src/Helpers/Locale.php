<?php

namespace Elnooronline\LaravelBootstrapForms\Helpers;

class Locale
{
    public $properties = [];

    public function __construct($properties)
    {
        $this->properties = $properties;
    }

    /**
     * Get a list of language representations.
     *
     * @return static[]
     */
    public static function all()
    {
        $languages = config('laravel-bootstrap-forms.locales');

        foreach ($languages as $properties) {
            $instances[] = new static($properties);
        }

        return $instances;
    }

    public function __get($name)
    {
        return $this->properties[$name];
    }
}