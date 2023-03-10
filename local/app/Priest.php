<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priest extends Model
{
    protected $table = 'priests';

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'prefix',
        'suffix',
        'is_deleted',
        'created_at',
        'updated_at'
    ];
}
