<?php

namespace Elnooronline\LaravelBootstrapForms\Components;

use Elnooronline\LaravelBootstrapForms\Components\Traits\HasMinLengthAndMaxLengthAttributes;

class PasswordComponent extends TextualComponent
{
    use HasMinLengthAndMaxLengthAttributes;

    /**
     * The component view path.
     *
     * @var string
     */
    protected $viewPath = 'BsForm::password';
}