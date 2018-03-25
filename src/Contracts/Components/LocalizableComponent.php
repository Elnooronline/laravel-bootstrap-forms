<?php

namespace Elnooronline\LaravelBootstrapForms\Contracts\Components;

use Elnooronline\LaravelBootstrapForms\Helpers\Locale;

interface LocalizableComponent
{
    public function locale(Locale $locale = null);
}