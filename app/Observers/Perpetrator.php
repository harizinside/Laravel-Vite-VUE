<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Perpetrator
{
    /**
     * Handle the Model "creating" event.
     *
     * @param  \App\Models  $model
     * @return void
     */
    public function creating(Model $model)
    {
        $model->created_by = Auth::user()->id;
        $model->updated_by = Auth::user()->id;
    }

    /**
     * Handle the Model "updating" event.
     *
     * @param  \App\Models  $model
     * @return void
     */
    public function updating(Model $model)
    {
        $model->updated_by = Auth::user()->id;
    }

    /**
     * Handle the Model "deleting" event.
     *
     * @param  \App\Models  $model
     * @return void
     */
    public function deleting(Model $model)
    {
        $model->deleted_by = Auth::user()->id;
    }
}
