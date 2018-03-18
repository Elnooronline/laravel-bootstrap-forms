<?php

namespace Elnooronline\LaravelBootstrapForms\Components;

use Illuminate\Support\Facades\Lang;
use Illuminate\Contracts\Support\Htmlable;

abstract class BaseComponent implements Htmlable
{
    /**
     * @var string
     */
    protected $lang;

    /**
     * The form resource name.
     *
     * @var string
     */
    protected $resource;

    /**
     * The input's name attribute.
     *
     * @var string
     */
    protected $name;

    /**
     * The input's value attribute.
     *
     * @var string
     */
    protected $value;

    /**
     * The input's label attribute.
     *
     * @var string
     */
    protected $label;

    /**
     * The component view path.
     *
     * @var string
     */
    protected $viewPath;

    /**
     * The input's help-block note.
     *
     * @var string
     */
    protected $note;

    /**
     * The input's attributes.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * The select's options array.
     *
     * @var array
     */
    protected $options = [];

    /**
     * The component style.
     *
     * @var string
     */
    protected $style = 'default';

    /**
     * Show inline validation errors.
     *
     * @var bool
     */
    protected $inlineValidation = true;

    /**
     * Set resource name property.
     *
     * @param $resource
     */
    public function __construct($resource)
    {
        $this->resource = $resource;
    }

    /**
     * Initialized the input arguments.
     *
     * @param null $name
     * @param null $value
     * @return $this
     */
    abstract public function init();

    /**
     * The variables with registerd in view component.
     *
     * @return array
     */
    abstract protected function viewComposer();

    /**
     * Set the default localed label for the input.
     *
     * @param $name
     * @return void
     */
    protected function hasDefaultLocaledLabel($name)
    {
        $name = $this->getDefaultLabel($name);

        if (Lang::has($trans = "{$this->resource}.attributes.$name")) {
            $this->label = Lang::get($trans);
        }

        if ($this->lang) {
            $this->label = $this->label. " ({$this->lang})";
        }
    }

    /**
     * Set the default localed note (help-block) for the input.
     *
     * @param $name
     * @return void
     */
    protected function hasDefaultLocaledNote($name)
    {
        if (Lang::has($trans = "{$this->resource}.notes.$name")) {
            $this->note = Lang::get($trans);
        }
    }

    /**
     * Set the default localed placeholder for the input.
     *
     * @param $name
     * @return void
     */
    protected function hasDefaultLocaledPlaceholder($name)
    {
        if (Lang::has($trans = "{$this->resource}.placeholders.$name")) {
            $this->attributes['placeholder'] = Lang::get($trans);
        }
    }

    /**
     * @param $name
     * @return $this
     */
    public function name($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param $label
     * @return $this
     */
    public function label($label = null)
    {
        $this->label = $label;

        return $this;
    }

    /**
     *
     * @param $name
     * @return string
     */
    protected function getDefaultLabel($name)
    {
        $pattern = "/([a-zA-Z0-9]+)(:.*)?(\[(?:.*)\])?/";
        $name = preg_replace($pattern, "$1", $name);

        return $name;
    }

    /**
     * @param $value
     * @return $this
     */
    public function value($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @param $required
     * @return $this
     */
    public function required($required = true)
    {
        if ($required) {
            $this->attributes['required'] = 'required';
        }

        return $this;
    }

    /**
     * @param $autofocus
     * @return $this
     */
    public function autofocus($autofocus = true)
    {
        if ($autofocus) {
            $this->attributes['autofocus'] = 'autofocus';
        }

        return $this;
    }

    /**
     * Add custom attribute.
     *
     * @param string|array $key
     * @param null $value
     * @return $this
     */
    public function attribute($key, $value = null)
    {
        if (is_array($key)) {
            $this->attributes = array_merge($this->attributes, $key);
        } else {
            $this->attributes[$key] = $value;
        }

        return $this;
    }

    /**
     * @param $note
     * @return $this
     */
    public function note($note)
    {
        $this->note = $note;

        return $this;
    }

    protected function getViewPath()
    {
        return $this->viewPath.'.'.$this->style;
    }

    /**
     * Set the component style.
     *
     * @param $style
     * @return $this
     */
    public function style($style)
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

    protected function render()
    {
        return view($this->getViewPath())->with(array_merge([
            'label' => $this->label,
            'name' => $this->name,
            'value' => $this->value,
            'note' => $this->note,
            'attributes' => $this->attributes,
            'inlineValidation' => $this->inlineValidation,
        ], $this->viewComposer()))->render();
    }

    public function toHtml()
    {
        return $this->render();
    }
}