<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model
{
    use SoftDeletes;
    
    protected $table = 'tenants';

    protected $fillable = [
        'name','subdomain','enable', 'theme', 'created_by', 'updated_by'
    ];
}
