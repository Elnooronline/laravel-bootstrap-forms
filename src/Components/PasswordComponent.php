<?php

namespace Elnooronline\LaravelBootstrapForms\Components;

class PasswordComponent extends TextualComponent
{
    /**
     * The component view path.
     *
     * @var string
     */
    protected $viewPath = 'BsForm::password';

    /**
     * Initialized the input arguments.
     *
     * @param null $name
     * @param null $value
     * @return $this
     */
    public function init($name = null)
    {
        $this->name = $name;
        
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