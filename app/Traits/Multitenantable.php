<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Multitenantable {

    protected static function bootMultitenantable()
    {
        if (auth()->check()) {
            static::creating(function ($model) {
                $model->created_by = auth()->id();
            });

            // if user is not administrator - role_id 1
             if (auth()->user()->id != 1) {
                static::addGlobalScope('created_by', function (Builder $builder) {
                    $builder->where('created_by', auth()->id());
                });
             }
        }
    }

}