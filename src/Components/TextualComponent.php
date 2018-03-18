<?php

namespace Elnooronline\LaravelBootstrapForms\Components;

class TextualComponent extends BaseComponent
{

    /**
     * Initialized the input arguments.
     *
     * @return $this
     */
    public function init()
    {
        //
    }

    /**
     * Add the given lang to the name attribute.
     *
     * @param $code
     * @param $name
     * @return $this
     */
    public function lang($code, $name)
    {
        $this->lang = $name;

        $this->hasDefaultLocaledLabel($this->name);

        $this->name = $this->name.':'.$code;

        return $this;
    }

    /**
     * @param $max
     * @return $this
     */
    public function max($max)
    {
        $this->attributes['max'] = $max;

        return $this;
    }

    /**
     * @param $min
     * @return $this
     */
    public function min($min)
    {
        $this->attributes['min'] = $min;

        return $this;
    }

    /**
     * @param $step
     * @return $this
     */
    public function step($step)
    {
        $this->attributes['step'] = $step;

        return $this;
    }

    /**
     * @param $placeholder
     * @return $this
     */
    public function placeholder($placeholder)
    {
        $this->attributes['placeholder'] = $placeholder;

        return $this;
    }

    /**
     * The variables with registerd in view component.
     *
     * @return array
     */
    protected function viewComposer()
    {
        return [];
    }
}