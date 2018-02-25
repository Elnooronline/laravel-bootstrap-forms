<?php

namespace Elnooronline\LaravelBootstrapForms\Components;

class NumberComponent extends TextualComponent
{
    /**
     * The component view path.
     *
     * @var string
     */
    protected $viewPath = 'BsForm::number';

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

        $this->hasDefaultLocaledLabel($name);

        $this->hasDefaultLocaledNote($name);

        $this->hasDefaultLocaledPlaceholder($name);

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