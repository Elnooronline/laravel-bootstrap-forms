<?php

namespace Elnooronline\LaravelBootstrapForms\Components;

use Elnooronline\LaravelBootstrapForms\Components\Traits\HasMinLengthAndMaxLengthAttributes;

class EmailComponent extends TextualComponent
{
    use HasMinLengthAndMaxLengthAttributes;

    /**
     * The component view path.
     *
     * @var string
     */
    protected $viewPath = 'BsForm::email';
}