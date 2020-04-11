<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model {
    protected $table = 'likes';
    protected $fillable = ['id','user_id', 'like_user_id'];
    public $timestamps = false;

}
