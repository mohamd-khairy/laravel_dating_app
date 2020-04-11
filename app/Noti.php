<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noti extends Model {
    protected $table = 'notify';
    protected $fillable = ['id','user_id', 'type','date','state','noti_user_id'];
    public $timestamps = false;

}
