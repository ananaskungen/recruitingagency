<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeeker extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'gender', 'email', 'phone_number', 'linkedin_profile', 'github_profile', 'location', 'remote', 'website', 'additional_info', 'video'];

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }
}
