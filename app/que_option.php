<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class que_option extends Model
{
    protected $fillable = ['que_auto_id','survey_auto_id','options','created_by','publish'];
}
