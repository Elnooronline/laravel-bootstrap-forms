<?php

namespace Elnooronline\LaravelBootstrapForms;

use Collective\Html\FormBuilder;
use Elnooronline\LaravelBootstrapForms\Helpers\Locale;
use Elnooronline\LaravelBootstrapForms\Traits\HasOpenAndClose;
use Elnooronline\LaravelBootstrapForms\Components\FileComponent;
use Elnooronline\LaravelBootstrapForms\Components\TextComponent;
use Elnooronline\LaravelBootstrapForms\Components\TimeComponent;
use Elnooronline\LaravelBootstrapForms\Components\DateComponent;
use Elnooronline\LaravelBootstrapForms\Components\EmailComponent;
use Elnooronline\LaravelBootstrapForms\Components\RadioComponent;
use Elnooronline\LaravelBootstrapForms\Components\NumberComponent;
use Elnooronline\LaravelBootstrapForms\Components\SelectComponent;
use Elnooronline\LaravelBootstrapForms\Components\SubmitComponent;
use Elnooronline\LaravelBootstrapForms\Components\PasswordComponent;
use Elnooronline\LaravelBootstrapForms\Components\CheckboxComponent;
use Elnooronline\LaravelBootstrapForms\Components\TextareaComponent;
use Elnooronline\LaravelBootstrapForms\Contracts\Components\LocalizableComponent;

class BsForm
{
    use HasOpenAndClose;

    private $resource;

    /**
     * @var \Elnooronline\LaravelBootstrapForms\Helpers\Locale
     */
    protected $locale;

    /**
     * @var \Elnooronline\LaravelBootstrapForms\Helpers\Locale[]
     */
    protected $locales = [];

    /**
     * The component style.
     *
     * @var string
     */
    protected $style;

    /**
     * Show inline validation errors.
     *
     * @var bool
     */
    protected $inlineValidation = true;

    /**
     * @var array
     */
    protected $components = [
        'text' => TextComponent::class,
        'textarea' => TextareaComponent::class,
        'password' => PasswordComponent::class,
        'submit' => SubmitComponent::class,
        'email' => EmailComponent::class,
        'number' => NumberComponent::class,
        'select' => SelectComponent::class,
        'date' => DateComponent::class,
        'time' => TimeComponent::class,
        'checkbox' => CheckboxComponent::class,
        'radio' => RadioComponent::class,
        'file' => FileComponent::class,
    ];

    /**
     * @var
     */
    protected static $instance;

    /**
     * BsForm constructor.
     */
    private function __construct()
    {
        $this->locales = Locale::all();
    }

    /**
     * @param $name
     * @param $component
     */
    public function registerComponent($name, $component)
    {
        $this->components[$name] = $component;
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if (isset($this->components[$name])) {
            $instance = new $this->components[$name]($this->resource);

            if ($instance instanceof LocalizableComponent) {
                $instance->locale($this->locale);

                if ($this->locale) {
                    $instance->transformLabel(false);
                }
            }

            if ($this->style) {
                $instance->style($this->style);
            }

            $instance->inlineValidation($this->inlineValidation);

            return $instance->init(...$arguments);
        }
        if (in_array($name, $this->getFormBuilderMethods())) {
            return app('form')->{$name}(...$arguments);
        }

        $className = __CLASS__;
        throw new MethodNotFoundException("method {$name} not found in {$className}!", $name, $className);
    }

    /**
     * Set the default locale code.
     *
     * @param $code
     * @return $this
     */
    public function locale(Locale $locale = null)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @param $resource
     * @return $this
     */
    public function resource($resource)
    {
        $this->resource = $resource;

        return $this;
    }

    /**
     * Set the components style.
     *
     * @param $style
     * @return $this
     */
    public function style($style = null)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Set the input inline validation errors option.
     *
     * @param bool $bool
     * @return $this
     */
    public function inlineValidation($bool = true)
    {
        $this->inlineValidation = $bool;

        return $this;
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function getFormBuilderMethods()
    {
        $class = new \ReflectionClass(FormBuilder::class);
        $methods = $class->getMethods(\ReflectionMethod::IS_PUBLIC);
        $methodsList = [];
        foreach ($methods as $method) {
            if (! starts_with($method->getName(), '__')) {
                $methodsList[] = $method->getName();
            }
        }

        return $methodsList;
    }

    /**
     * @return static
     */
    public static function getInstance()
    {
        if ($instance = static::$instance) {
            return $instance;
        }

        return static::$instance = new static();
    }

    /**
     * @return \Elnooronline\LaravelBootstrapForms\Helpers\Locale[]
     */
    public function getLocales()
    {
        return $this->locales;
    }

    private function __clone()
    {
        //
    }
}