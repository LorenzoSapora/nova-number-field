<?php

namespace LorenzoSapora\Fields;

use Laravel\Nova\Fields\Number;

class Numbered extends Number
{
    public $component = 'numbered-field';

    public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->displayUsing(function ($value) {
            return !is_null($value) ? number_format($value) : null;
        });
    }
}
