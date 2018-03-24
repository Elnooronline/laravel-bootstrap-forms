<?php

namespace Elnooronline\LaravelBootstrapForms\Components;

use Elnooronline\LaravelBootstrapForms\Contracts\Components\LocalizableComponent;
use Elnooronline\LaravelBootstrapForms\Traits\LocalizableComponent as LocalizableComponentTrait;

class TextComponent extends TextualComponent implements LocalizableComponent
{
    use LocalizableComponentTrait;

    /**
     * The component view path.
     *
     * @var string
     */
    protected $viewPath = 'BsForm::text';

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
     * The variables with registerd in view component.
     *
     * @return array
     */
    protected function viewComposer()
    {
        return [];
    }
}