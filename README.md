# # Laravel Bootstrap Forms.
<p align="center">
<a href="https://travis-ci.org/elnooronline/laravel-bootstrap-forms"><img src="https://travis-ci.org/elnooronline/laravel-bootstrap-forms.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/elnooronline/laravel-bootstrap-forms"><img src="https://poser.pugx.org/elnooronline/laravel-bootstrap-forms/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/elnooronline/laravel-bootstrap-forms"><img src="https://poser.pugx.org/elnooronline/laravel-bootstrap-forms/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/elnooronline/laravel-bootstrap-forms"><img src="https://poser.pugx.org/elnooronline/laravel-bootstrap-forms/license.svg" alt="License"></a>
</p>

- [Installation](#installation)
- [Opening A Form](#opening-a-form)
- [Text, Text Area, Date, Number & Password Fields](#fields)
- [Checkboxes and Radio Buttons](#checkboxes)
- [Drop-Down Lists](#dropdown)
- [Generating A Submit Button](#submit)
- [Supported Methods](#methods)
- [Using Resource With Localed Fields](#resource)
- [Example Register Form](#example)
- [Add Custom Style To The Component](#custom-style)
- [Add Custom Component](#custom-component)

<a name="installation"></a>
# # Installation
Begin by installing this package through Composer. Edit your project's `composer.json` file to require `elnooronline/laravel-bootstrap-forms`.
```
composer require elnooronline/laravel-bootstrap-forms
```
<a name="opening-a-form"></a>
# # Opening A Form
```
{{ BsForm::open(['url' => 'foo/bar']) }}
//
{{ BsForm::close() }}
```
By default, a `POST` method will be assumed; however, you are free to specify another method:
```
{{ BsForm::open(['url' => 'foo/bar', 'method' => 'post']) }}
```

>Note: Since HTML forms only support `POST` and `GET`, `PUT` and `DELETE` methods will be spoofed by automatically adding a `_method` hidden field to your form.

You may also open forms with method as well:
 ```
 {{ BsForm::get('foo/bar') }}
 {{ BsForm::post('foo/bar') }}
 {{ BsForm::put('foo/bar') }}
 {{ BsForm::patch('foo/bar') }}
 {{ BsForm::delete('foo/bar') }}
 {{ BsForm::model($model, 'foo/bar') }}
 {{ BsForm::putModel($model, 'foo/bar') }}
 {{ BsForm::patchModel($model, 'foo/bar') }}
 ```
You may also open forms that point to named routes or controller actions:
```
{{ BsForm::open(['route' => 'route.name']) }}
{{ BsForm::open(['action' => 'Controller@method']) }}
```
You may pass in route parameters as well:
```
{{ BsForm::open(['route' => ['route.name', $user->id]]) }}
{{ BsForm::open(['action' => ['Controller@method', $user->id]]) }}
```
<a name="fields"></a>
# # Text, Text Area, Date, Number & Password Fields
Generating A Text Input
```
{{ BsForm::text('username') }}
```
## Specifying A Default Value
```
{{ BsForm::text('email', 'example@gmail.com') }}
{{ BsForm::text('email')->value('example@gmail.com') }}
```
>Note: The date, number and textarea methods have the same signature as the text method.
 ## Generating A Password Input
```
{{ BsForm::password('password', ['class' => 'awesome']) }}
{{ BsForm::password('password')->attr('class', 'awesome') }}
```
## Generating Other Inputs
```
{{ BsForm::email($name)->value($value)->label($label) }}
{{ BsForm::file($name)->label('Upload File') }}
```
<a name="checkboxes"></a>
# # Checkboxes and Radio Buttons
## Generating A Checkbox Or Radio Input
```
{{ BsForm::checkbox('name', 'value')->checked(false) }}
{{ BsForm::checkbox('name')->value('value')->checked(false) }}

{{ BsForm::radio('name', 'value')->checked(false)->label('label') }}
{{ BsForm::radio('name')->value('value')->checked(false)->label('label') }}
```
<a name="dropdown"></a>
# # Drop-Down Lists
```
{{ BsForm::select('size', ['L' => 'Large', 'S' => 'Small']) }}
{{ BsForm::select('size')->options(['L' => 'Large', 'S' => 'Small']) }}
```
## Generating A Drop-Down List With Selected Default
```
{{ BsForm::select('size')->options(['L' => 'Large', 'S' => 'Small'])->value('S') }}
```
## Generating a Drop-Down List With an Empty Placeholder
```
{{ BsForm::select('size')->options(['L' => 'Large', 'S' => 'Small'])->placeholder('Select Size') }}
```
## Generating A Grouped List
```
{{ BsForm::select('animal',[
         'Cats' => ['leopard' => 'Leopard'],
         'Dogs' => ['spaniel' => 'Spaniel'],
   ]) }}
```
<a name="submit"></a>
# # Generating A Submit Button
```
{{ BsForm::submit('Click Me!') }}
```
## Generateing A Submit Button With Bootstrap Button Style
```
{{ BsForm::submit('Click Me!')->success() }}
{{ BsForm::submit('Click Me!')->praimary() }}
{{ BsForm::submit('Click Me!')->info() }}
{{ BsForm::submit('Click Me!')->warning() }}
{{ BsForm::submit('Click Me!')->danger() }}
``` 
<a name="metods"></a>
# # Supported Methods
`->label($label) ` : To Generate label to the specified field.
```
{{ BsForm::text('username')->label('Username') }}
```

`->name($name) ` : To Generate label to the specified field.
```
{{ BsForm::text('username')->label('Username') }}
```

`->placeholder($placeholder) ` : To Set placeholder attribute to the specified field.
```
{{ BsForm::text('username')->placeholder('Please Enter Your Name') }}
```

`->min($min)` : To Set min attribute to the specified number field.
```
{{ BsForm::number('age')->min(10) }}
```

`->max($max)` : To Set max attribute to the specified number field.
```
{{ BsForm::number('age')->min(10)->max(30) }}
```

`->step($step)` : To Set step attribute to the specified number field.
```
{{ BsForm::number('age')->min(10)->max(30)->step(1) }}
```

`->multiple($bool = true)` : To Set multiple attribute to the specified select and file fields.
```
{{ BsForm::file('photos[]')->multiple() }}
```

`->note($note)` : To Set `help-block` to the specified field.
```
{{ BsForm::text('username')->note('Example: Ahmed Fathy') }}
```

`->name($name)` : To Set the name of to the specified field.
```
{{ BsForm::text()->name('username')->note('Example: Ahmed Fathy') }}
```

`->value($value)` : To Set the value of to the specified field as default will set `old('name')`.
```
{{ BsForm::text()->name('username')->value('Ahmed Fathy') }}
```

`->inlineValidation($bool = true)` : To display validation errors in the specified field.
```
{{ BsForm::text('username')->style('vertical')->inlineValidation(false) }}
```

`->style($style = 'default')` : To Set style to the specified field. supported `['default', 'vertical']`
```
{{ BsForm::text('username')->style('vertical') }}
{{ BsForm::text('email')->style('default') }}
```

`->close()` : To close the form tag
```
{{ BsForm::close() }}
```
<a name="resource"></a>
# # Using Resource With Localed Fields
You may add localed labels, notes and placeholders using resource option as well:
```
BsForm::resource('users');
```
> You must add `users.php` file to the `resources/lang/en/` path and set the default attributes and notes, placeholders as well:
```
<?php
return [
    'attributes' => [
        'username' => 'User Name',
        'email' => 'E-mail Address',
        'phone' => 'Phone Number',
    ],
    'notes' => [
        'username' => 'Example: Ahmed Fathy',
        'email' => 'Example: aliraqi-dev@gmail.com',
        'phone' => 'Example: +02xxxxxxxxxxx',
    ],
    'placeholders' => [
        'username' => 'Please enter your name.',
        'email' => 'Please enter your e-mail address.',
        'phone' => 'Please enter your phone number.',
    ],
    ...
];
```
<a name="example"></a>
# # Example Register Form
```
@php(BsForm::resource('users'))

{{ BsForm::post(route('register')) }}
	{{ BsForm::text()->name('name') }}
	{{ BsForm::email('email') }}
	{{ BsForm::text('phone') }}
	{{ BsForm::submit()->danger() }}
{{ BsForm::close() }}
```
<a name="custom-style"></a>
# # Add Custom Style To The Component
run the `vendor:publish` artusan command to override components views as well.
```
php artisan vendor:publish --provider="Elnooronline\LaravelBootstrapForms\Providers\BootstrapFormsServiceProvider" --tag BsForm
```
will override components in `resources/views/vendor/BsForm` path.

- views
	- vendor
		- BsForm
			- text
				- default.blade.php
				- vertical.blade.php
				- custom.blade.php
			- email
				- default.blade.php
				- vertical.blade.php
				- custom.blade.php

you can copy `default.blade.php` file as `custom.blade.php` and use custom style as well :
```
{{ BsForm::text('name')->style('custom') }}
```
<a name="custom-component"></a>
# # Add Custom Component
You may add new component class extends `BaseComponent` and regoster it in your `boot()` method in `AppServiceProvider` class as well:
```
<?php

namespace App\Components;

use Elnooronline\LaravelBootstrapForms\Components\BaseComponent;

class ImageComponent extends BaseComponent
{
    /**
     * The component view path.
     *
     * @var string
     */
    protected $viewPath = 'components.image';

    /**
     * The image file path.
     *
     * @var string
     */
    protected $file;

    /**
     * Initialized the input arguments.
     *
     * @param null $name
     * @param null $file
     * @return $this
     */
    public function init($name = null, $file = null)
    {
        $this->name = $name;

        $this->value = $file ?: 'http://via.placeholder.com/100x100';

        //$this->hasDefaultLocaledLabel($name);

        //$this->hasDefaultLocaledNote($name);

        //$this->hasDefaultLocaledPlaceholder($name);

        return $this;
    }

    /**
     * Set the file path.
     *
     * @param $file
     * @return $this
     */
    public function file($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * The variables with registerd in view component.
     *
     * @return array
     */
    protected function viewComposer()
    {
        return [
            'file' => $this->file,
        ];
    }
}
```
Then register the component class in `boot()` method in your `AppServiceProvider` class as well :
```
<?php

namespace App\Providers;

use App\Components\ImageComponent;
use Illuminate\Support\ServiceProvider;
use Elnooronline\LaravelBootstrapForms\Facades\BsForm;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        BsForm::registerComponent('image', ImageComponent::class);
        ...
    }
    ...
```  
Then create component view file in `views/components/image/default.blade.php` path.
   
example content of `views/components/image/default.blade.php` file :
```
<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    @if($label)
        {{ Form::label($name, $label, ['class' => 'content-label']) }}
    @endif

    {{ Form::file($name, array_merge(['class' => 'form-control'], $attributes)) }}

    @if($inlineValidation)
        @if($errors->has($name))
            <strong class="help-block">{{ $errors->first($name) }}</strong>
        @else
            <strong class="help-block">{{ $note }}</strong>
        @endif
    @else
        <strong class="help-block">{{ $note }}</strong>
    @endif
        
    @if($file)
        <div class="row">
            <div class="col-xs-6 col-md-3">
                <a href="#" class="thumbnail">
                    <img src="{{ $file }}">
                </a>
            </div>
        </div>
    @endif
</div>

```
## Usage
```
{{ BsForm::image('photo', $url) }}
```
