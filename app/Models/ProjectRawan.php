<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectRawan extends Model
{
    use HasFactory;
     protected $table = 'projects_rawan';

    protected $primaryKey = 'project_id';

    protected $fillable = [
        'student_id',
        'name',
        'governorate',
        'project_idea',
        'project_details',
    ];
}
