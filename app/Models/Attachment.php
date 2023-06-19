<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = ['job_seeker_id', 'employer_id', 'case_manager_id', 'file_path'];

    public function jobSeeker()
    {
        return $this->belongsTo(JobSeeker::class);
    }

    public function caseManager()
    {
        return $this->belongsTo(CaseManager::class);
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
