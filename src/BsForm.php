<?php

namespace Elnooronline\LaravelBootstrapForms;

use Form;
use Collective\Html\FormBuilder;
use Prophecy\Exception\Doubler\MethodNotFoundException;
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

class BsForm
{
    use HasOpenAndClose;

    private $resource;

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
            return (new $this->components[$name]($this->resource))->init(...$arguments);
        }
        if (in_array($name, $this->getFormBuilderMethods())) {
            return app('form')->{$name}(...$arguments);
        }
        $className = __CLASS__;

        throw new MethodNotFoundException("method {$name} not found in {$className}!", $name, $className);
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

    private function __clone()
    {
        //
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
            if (!starts_with($method->getName(), '__')) {
                $methodsList[] = $method->getName();
            }
        }
        return $methodsList;
    }
}