<?php

namespace Elnooronline\LaravelBootstrapForms\Traits;

use Astrotomic\Translatable\Validation\RuleFactory;
use Elnooronline\LaravelBootstrapForms\Helpers\Locale;

trait LocalizableComponent
{
    public function __construct()
    {
        if (! class_exists(RuleFactory::class)) {
            throw new \Exception('Translatable package is not installed please install it: "composer require astrotomic/laravel-translatable"');
        }
    }

    /**
     * @var \Elnooronline\LaravelBootstrapForms\Helpers\Locale
     */
    protected $locale;

    /**
     * Determine if the label will be translated or not.
     *
     * @var bool
     */
    protected $transformLabel = true;

    /**
     * Add the given lang to the name attribute.
     *
     * @param $code
     * @param $name
     * @return $this
     */
    public function locale(Locale $locale = null)
    {
        $this->locale = $locale;

        $this->setDefaultLabel($this->name);

        return $this;
    }

    /**
     * @param $transformLabel
     * @return $this
     */
    public function transformLabel($transformLabel)
    {
        $this->transformLabel = $transformLabel;

        return $this;
    }

    /**
     * Transform the properties to be used in view.
     *
     * @param array $properties
     * @return array
     */
    protected function transformProperties(array $properties)
    {
        $locale = optional($this->locale);

        $nameHasBrackets = $this->nameHasBrackets;

        if ($locale->code) {
            $prefix = config('translatable.rule_factory.prefix');
            $suffix = config('translatable.rule_factory.suffix');
            $localedName = array_keys(
                RuleFactory::make(
                    [$prefix.$properties['nameWithoutBrackets'].$suffix => null],
                    null,
                    null,
                    null,
                    [$this->locale->code]
                )
            )[0];

            $properties['nameWithoutBrackets'] = $localedName;

            if ($nameHasBrackets) {
                $properties['name'] = "{$localedName}[]";
            } else {
                $properties['name'] = $localedName;
            }
        }

        if ($this->transformLabel && $locale->name) {
            $properties = array_merge($properties, [
                'label' => "{$this->label} ({$this->locale->native})",
            ]);
        }

        return $properties;
    }
}