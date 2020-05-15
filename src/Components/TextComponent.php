<?php

namespace Elnooronline\LaravelBootstrapForms\Components;

use Elnooronline\LaravelBootstrapForms\Contracts\Components\LocalizableComponent;
use Elnooronline\LaravelBootstrapForms\Components\Traits\HasMinLengthAndMaxLengthAttributes;
use Elnooronline\LaravelBootstrapForms\Traits\LocalizableComponent as LocalizableComponentTrait;

class TextComponent extends TextualComponent implements LocalizableComponent
{
    use LocalizableComponentTrait, HasMinLengthAndMaxLengthAttributes;

    /**
     * The component view path.
     *
     * @var string
     */
    protected $viewPath = 'text';
}