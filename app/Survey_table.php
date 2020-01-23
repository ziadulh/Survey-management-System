<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey_table extends Model
{
    protected $fillable = ['que_ans_auto_id','ans','survey_performer_profession','survey_id',];
}
