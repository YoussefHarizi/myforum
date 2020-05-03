<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAccount extends Model
{
    //
    protected $fillable = ['provider_id', 'provider_name'];
    public function post()
    {
        return $this->belongsTo('App\User');
    }
}
