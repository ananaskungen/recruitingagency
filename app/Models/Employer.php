<?php

namespace App\Models;

use App\Models\User;
use App\Models\Attachment;
use App\Models\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employer extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'first_name', 
        'last_name', 
        'email', 
        'phone_number', 
        'linkedin_profile', 
        'location', 
        'is_remote', 
        'website', 
        'additional_info', 
        'company',
        'is_approved'
    ];

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function application()
    {
        return $this->hasOne(Application::class);
    }
}
