<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // The name of the table associated with the model (optional if the table name is the plural form of the model)
    protected $table = 'employees';

    // The attributes that are mass assignable
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'pic', // Profile picture path
        'hire_date',
    ];

    // The attributes that should be hidden for arrays (e.g. password)
    protected $hidden = [
        'password',
    ];
}
