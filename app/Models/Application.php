<?php

namespace App\Models;

use App\Models\Employer;
use App\Models\JobSeeker;
use App\Models\CaseManager;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_seeker_id',
        'case_manager_id',
        'employer_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobSeeker()
    {
        return $this->belongsTo(JobSeeker::class);
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function caseManager()
    {
        return $this->belongsTo(CaseManager::class);
    }

}
