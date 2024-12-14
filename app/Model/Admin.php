<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use SoftDeletes;

    protected $table = 'admins';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_code', 
        'name', 
        'email', 
        'password', 
        'phone', 
        'date_of_birth',
    ];
    
    protected $guarded = [];
}
