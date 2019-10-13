<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transactions";
    public $timestamps = false;
    protected $fillable = ['r_uid','r_name','s_uid','s_name','amount'];

    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
