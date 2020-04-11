<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model {
    protected $table = 'chat';
    protected $fillable = ['id','user_id', 'user_id2'];
    public $timestamps = false;

}
