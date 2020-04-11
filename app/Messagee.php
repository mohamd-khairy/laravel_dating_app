<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messagee extends Model {
    protected $table = 'message';
    protected $fillable = ['id','user_id', 'chat_id','message','date'];
    public $timestamps = false;

}
