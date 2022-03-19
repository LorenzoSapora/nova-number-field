<?php

namespace LorenzoSapora\Fields;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class FieldServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('format-number', __DIR__ . '/../dist/js/field.js');
        });
    }

    public function register()
    {
        //
    }
}
