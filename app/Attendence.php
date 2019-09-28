<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    protected $fillable = [
   'user_id', 'attendence', 'edit_date','att_date','edit_date','month'
   ];
}
