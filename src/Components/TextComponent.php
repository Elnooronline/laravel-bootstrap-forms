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
}