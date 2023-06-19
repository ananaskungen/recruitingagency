<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    
    protected $fillable = ['first_name', 'last_name', 'email', 'phone_number', 'linkedin_profile', 'location', 'remote', 'website', 'additional_info', 'company'];

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }
}
