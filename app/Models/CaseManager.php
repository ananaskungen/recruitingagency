<?php

namespace App\Models;

use App\Models\User;
use App\Models\Attachment;
use App\Models\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CaseManager extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'first_name', 
        'last_name', 
        'gender', 
        'email', 
        'phone_number', 
        'past_experience', 
        'linkedin_profile', 
        'github_profile', 
        'location', 
        'is_remote', 
        'website', 
        'additional_info', 
        'is_working', 
        'field', 
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
