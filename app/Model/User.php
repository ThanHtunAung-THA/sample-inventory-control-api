<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    protected $table = 'users';

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
