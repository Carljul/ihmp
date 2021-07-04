<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'certificate_type', 'priest_id', 'meta', 'is_deleted',
    ];
}
