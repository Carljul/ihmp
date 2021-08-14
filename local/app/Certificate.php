<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'suffix','certificate_type', 'priest_id', 'meta', 'is_deleted',
    ];
}
