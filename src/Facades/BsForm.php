<?php

namespace Elnooronline\LaravelBootstrapForms\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class BsForm
 * @method static \Elnooronline\LaravelBootstrapForms\Components\TextComponent text($name = null, $value = null)
 * @method static \Elnooronline\LaravelBootstrapForms\Components\EmailComponent email($name = null, $value = null)
 * @method static \Elnooronline\LaravelBootstrapForms\Components\PasswordComponent password($name = null, $value = null)
 * @method static \Elnooronline\LaravelBootstrapForms\Components\TextareaComponent textarea($name = null, $value = null)
 * @method static \Elnooronline\LaravelBootstrapForms\Components\CheckboxComponent checkbox($name = null, $value = null, $checked = false)
 * @method static \Elnooronline\LaravelBootstrapForms\Components\RadioComponent radio($name = null, $value = null, $checked = false)
 * @method static \Elnooronline\LaravelBootstrapForms\Components\DateComponent date($name = null, $value = null)
 * @method static \Elnooronline\LaravelBootstrapForms\Components\FileComponent file($name = null)
 * @method static \Elnooronline\LaravelBootstrapForms\Components\NumberComponent number($name = null, $value = null)
 * @method static \Elnooronline\LaravelBootstrapForms\Components\SelectComponent select($name = null, $options = [], $value = null)
 * @method static \Elnooronline\LaravelBootstrapForms\Components\SubmitComponent submit($label = null, $name = null)
 * @method static  \Elnooronline\LaravelBootstrapForms\BsForm open($url, $attributes = [])
 * @method static  \Elnooronline\LaravelBootstrapForms\BsForm resource($resource)
 * @method static  \Elnooronline\LaravelBootstrapForms\BsForm locale($locale = null)
 * @method static  \Elnooronline\LaravelBootstrapForms\BsForm style($style = null)
 * @method static  \Elnooronline\LaravelBootstrapForms\BsForm clearStyle()
 * @method static  \Elnooronline\LaravelBootstrapForms\BsForm inlineValidation($bool = true)
 * @method static  \Illuminate\Support\HtmlString close()
 *
 * @package Elnooronline\LaravelBootstrapForms\Facades
 */
class BsForm extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bootstrap.form';
    }
}