<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ["facebook_url", "twitter_url", "instagram_url", "employee_id"];

    public function employee ()
    {
        return $this->belongsTo(Employee::class);
    }
}
