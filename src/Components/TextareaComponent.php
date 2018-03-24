<?php

namespace Elnooronline\LaravelBootstrapForms\Components;


use Elnooronline\LaravelBootstrapForms\Contracts\Components\LocalizableComponent;
use Elnooronline\LaravelBootstrapForms\Traits\LocalizableComponent as LocalizableComponentTrait;

class TextareaComponent extends TextualComponent implements LocalizableComponent
{
    use LocalizableComponentTrait;

    /**
     * The component view path.
     *
     * @var string
     */
    protected $viewPath = 'BsForm::textarea';

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
     * Set textarea cols attribute.
     *
     * @param $cols
     * @return $this
     */
    public function cols($cols)
    {
        $this->attributes['cols'] = $cols;

        return $this;
    }

    /**
     * Set textarea rows attribute.
     *
     * @param $rows
     * @return $this
     */
    public function rows($rows)
    {
        $this->attributes['rows'] = $rows;

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