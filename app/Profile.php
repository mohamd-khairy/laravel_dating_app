<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {
    protected $table = 'userdata';
    protected $fillable = ['id','age','gendar', 'religion','mobile','nationality','bio', 'location','additional_information'];
    public $timestamps = false;

}
