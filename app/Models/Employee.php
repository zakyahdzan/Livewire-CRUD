<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasGlobalScopes;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasGlobalScopes;

    protected $fillable = ['nama', 'email', 'alamat'];
}
