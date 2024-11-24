<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

        const AUTHOR = 'Author';
        const ADMIN = 'Admin';
    
    public function users()
    {
        return $this->hasMany(\App\Models\User::class);
    }
}
