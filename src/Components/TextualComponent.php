<?php

namespace Elnooronline\LaravelBootstrapForms\Components;

use Elnooronline\LaravelBootstrapForms\Components\Traits\HasPlaceholder;

abstract class TextualComponent extends BaseComponent
{
    use HasPlaceholder;

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