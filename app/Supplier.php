<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
   'name', 'email', 'phone','address','photo','city','shop','accountholder','accountnumber','bankname',branchname','type'
   ];
}
