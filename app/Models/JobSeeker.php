<?php

namespace App\Models;

use App\Models\Attachment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobSeeker extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'phone_number',
        'linkedin_profile',
        'github_profile',
        'location',
        'is_remote',
        'is_working',
        'job_type',
        'field',
        'website',
        'additional_info', 
        'is_approved'
    ];

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }
}
