<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionUser extends Model
{
    protected $table='permission_user';

    public $timestamps = false;
    
    protected $fillable = [
        'permission_id', 'user_id'
    ];
}
