<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
	use SoftDeletes;
    
    protected $table = 'roles';

    protected $fillable = [
        'name','all','sort', 'status', 'created_by', 'updated_by'
    ];
}
