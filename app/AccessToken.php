<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessToken extends Model
{
    protected $fillable = [
        'user_id', 'token_key', 'token_status', 'expiration',
    ];
}
