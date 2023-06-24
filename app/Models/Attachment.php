<?php

namespace App\Models;

use App\Models\Employer;
use App\Models\JobSeeker;
use App\Models\CaseManager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = ['job_seeker_id', 'employer_id', 'case_manager_id', 'file_path_attachment', 'file_path_video', 'file_type'];


    public function getFilePathAttribute()
    {
        return asset('storage/' . $this->attributes['file_path_attachment']);
    }

    public function getFilePathVideoAttribute()
    {
        return asset('storage/' . $this->attributes['file_path_video']);
    }

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
