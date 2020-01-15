<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey_question extends Model
{
    protected $fillable = ['name','surveyautoid'];
}
