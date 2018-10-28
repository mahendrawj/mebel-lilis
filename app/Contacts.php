<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    //
    protected $fillable = ['id','nama','email','comment'];
}
