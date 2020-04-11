<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {
    protected $table = 'userimage';
    protected $fillable = ['id','image','user_id', 'selected'];
    public $timestamps = false;

}
