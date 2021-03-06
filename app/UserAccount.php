<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAccount extends Model
{
    //
    protected $fillable = ['provider_id', 'provider_name'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
