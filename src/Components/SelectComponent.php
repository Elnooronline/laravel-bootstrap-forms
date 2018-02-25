<?php

namespace Elnooronline\LaravelBootstrapForms\Components;

class SelectComponent extends TextualComponent
{
    /**
     * The component view path.
     *
     * @var string
     */
    protected $viewPath = 'BsForm::select';

    /**
     * @var array
     */
    protected $options = [];

    /**
     * Initialized the input arguments.
     *
     * @param null $name
     * @param null $value
     * @return $this
     */
    public function init($name = null, $options = [], $value = null)
    {
        $this->name = $name;

        $this->value = $value ?: old($name);

        $this->options = $options;

        $this->hasDefaultLocaledLabel($name);

        $this->hasDefaultLocaledNote($name);

        $this->hasDefaultLocaledPlaceholder($name);

        return $this;
    }

    /**
     * @param array $options
     * @return $this
     */
    public function options($options = [])
    {
        $this->options = $options;

        return $this;
    }

    /**
     * The variables with registerd in view component.
     *
     * @return array
     */
    protected function viewComposer()
    {
        return [
            'options' => $this->options,
        ];
    }
}