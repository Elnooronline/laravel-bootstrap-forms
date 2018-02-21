<?php

namespace Elnooronline\LaravelBootstrapForms\Helpers;

use Illuminate\Support\Facades\Blade;

class RegisterFormDirectives
{
    /**
     * Register formpost directive.
     *
     * @return void
     */
    public function registerFormPost()
    {
        Blade::directive('formpost', function ($url, $attributes = []) {
            $attributes = json_encode($attributes);

            return "<?php echo BsForm::post($url, $attributes); ?>";
        });
    }

    /**
     * Register formpost directive.
     *
     * @return void
     */
    public function registerEndFormPost()
    {
        return $this->setCloseFormDirective('endformpost');
    }

    /**
     * Register formget directive.
     *
     * @return void
     */
    public function registerFormGet()
    {
        Blade::directive('formget', function ($url, $attributes = []) {
            $attributes = json_encode($attributes);

            return "<?php echo BsForm::get($url, $attributes); ?>";
        });
    }

    /**
     * Register formget directive.
     *
     * @return void
     */
    public function registerEndFormGet()
    {
        return $this->setCloseFormDirective('endformget');
    }

    /**
     * Register formput directive.
     *
     * @return void
     */
    public function registerFormPut()
    {
        Blade::directive('formput', function ($url, $attributes = []) {
            $attributes = json_encode($attributes);

            return "<?php echo BsForm::put($url, $attributes); ?>";
        });
    }

    /**
     * Register formput directive.
     *
     * @return void
     */
    public function registerEndFormPut()
    {
        return $this->setCloseFormDirective('endformput');
    }


    /**
     * Register form directive.
     *
     * @return void
     */
    public function registerForm()
    {
        Blade::directive('form', function ($url, $attributes = []) {
            $attributes = json_encode($attributes);

            return "<?php echo BsForm::open($url, $attributes); ?>";
        });
    }


    /**
     * Register endform directive.
     *
     * @return void
     */
    public function registerEndForm()
    {
        return $this->setCloseFormDirective('endform');
    }

    /**
     * Register the given close form directive.
     *
     * @return void
     */
    private function setCloseFormDirective($directive)
    {
        Blade::directive($directive, function () {
            return "<?php echo BsForm::close(); ?>";
        });
    }
}