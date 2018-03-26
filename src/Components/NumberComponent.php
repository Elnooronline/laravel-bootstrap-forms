<?php

namespace Elnooronline\LaravelBootstrapForms\Components;

use Elnooronline\LaravelBootstrapForms\Components\Traits\HasMinAndMaxAttributes;

class NumberComponent extends TextualComponent
{
    use HasMinAndMaxAttributes;

    /**
     * The component view path.
     *
     * @var string
     */
    protected $viewPath = 'BsForm::number';
}