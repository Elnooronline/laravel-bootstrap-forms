<?php

namespace Elnooronline\LaravelBootstrapForms;

use Elnooronline\LaravelBootstrapForms\Components\EmailComponent;
use Elnooronline\LaravelBootstrapForms\Components\NumberComponent;
use Form;
use Elnooronline\LaravelBootstrapForms\Traits\HasOpenAndClose;
use Elnooronline\LaravelBootstrapForms\Components\TextComponent;
use Elnooronline\LaravelBootstrapForms\Components\SubmitComponent;
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
        'submit' => SubmitComponent::class,
        'email' => EmailComponent::class,
        'number' => NumberComponent::class,
        'select' => SelectComponent::class,
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
        $class = $this->components[$name];

        return (new $class($this->resource))->init(...$arguments);
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
}