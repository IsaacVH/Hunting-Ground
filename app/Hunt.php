<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hunt extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hunts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'creator', 'start_date', 'end_date'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
