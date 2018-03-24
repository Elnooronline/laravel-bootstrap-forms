<?php

namespace Elnooronline\LaravelBootstrapForms\Contracts\Components;

interface LocalizableComponent
{
    public function locale($code, $name);
}