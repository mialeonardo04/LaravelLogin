<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'NIP';
    public $incrementing = false;

}
