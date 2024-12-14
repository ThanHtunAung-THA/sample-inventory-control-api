<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DeletedAdmin extends Model
{

    protected $primaryKey = 'id';

    protected $fillable = [
        'admin_id',
        'deleted_date',
        'user_code',
        'name',
        'email',
        'phone',
        'date_of_birth',
];

    public $timestamps = true;

}
