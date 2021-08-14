<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priest extends Model
{
    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'prefix', 'suffix', 'is_deleted',
    ];
}
