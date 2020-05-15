<?php

return [
    /**
     * The path of form components views.
     *
     * - 'BsForm::bootstrap4'  - Bootstrap 4
     * - 'BsForm::bootstrap3'  - Bootstrap 3
     */
    'views' => 'BsForm::bootstrap4',

    /**
     * The supported languages in form multilingual tabs.
     *
     * @deprecated
     */
    'locales' => [
        [
            'code' => 'ar',
            'native' => 'العربية',
            'name' => 'Arabic',
            'dir' => 'rtl',
        ],
        [
            'code' => 'en',
            'native' => 'English',
            'name' => 'English',
            'dir' => 'ltr',
        ],
    ],
];