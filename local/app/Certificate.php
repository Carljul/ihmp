<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    /**
     * Specifying the table name
     *
     * @var string
     */
    protected $table = 'certificates';

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'suffix',
        'certificate_type',
        'priest_id',
        'meta',
        'is_deleted',
        'created_by',
        'created_date',
        'updated_at'
    ];
}
