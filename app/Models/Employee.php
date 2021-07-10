<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'job_title', 'phone', 'address'];

    public function profile ()
    {
        return $this->hasOne(Profile::class, 'employee_id','id');
    }
}
