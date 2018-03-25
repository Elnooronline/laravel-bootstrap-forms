<?php

namespace Elnooronline\LaravelBootstrapForms\Helpers;

class Locale
{
    public $code;

    public $properties = [];

    public function __construct($code, $properties)
    {
        $this->code = $code;
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

        foreach ($languages as $code => $properties) {
            $instances[] = new static($code, $properties);
        }

        return $instances;
    }

    public function __get($name)
    {
        return $this->properties[$name];
    }
}