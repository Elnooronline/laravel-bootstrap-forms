<?php

namespace Elnooronline\LaravelBootstrapForms\Components;

abstract class TextualComponent extends BaseComponent
{
    /**
     * Initialized the input arguments.
     *
     * @param null $name
     * @param null $value
     * @return $this
     */
    public function init($name = null, $value = null)
    {
        $this->name = $name;

        $this->value = $value ?: old($name);

        $this->setDefaultLabel($name);

        $this->setDefaultNote($name);

        $this->setDefaultPlaceholder($name);

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