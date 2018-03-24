<?php

namespace Elnooronline\LaravelBootstrapForms\Traits;

trait LocalizableComponent
{
    /**
     * @var string
     */
    protected $localeName;

    /**
     * Add the given lang to the name attribute.
     *
     * @param $code
     * @param $name
     * @return $this
     */
    public function locale($code, $name)
    {
        $this->localeCode = $code;
        $this->localeName = $name;

        $this->setDefaultLabel($this->name);

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
        return array_merge($properties, [
            'name' => "{$this->name}:{$this->localeCode}",
            'label' => "{$this->label} ({$this->localeName})",
        ]);
    }
}