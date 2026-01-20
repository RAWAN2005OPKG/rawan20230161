<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectRawan;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function create()
    {
        $lastProject = ProjectRawan::orderBy('project_id', 'desc')->first();
        $nextProjectId = $lastProject ? $lastProject->project_id + 1 : 1;

        return view('add_Rawan', ['nextProjectId' => $nextProjectId]);
    }

    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'student_id' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'governorate' => 'required|string|max:255',
            'project_idea' => 'required|string|max:255',
            'project_details' => 'required|string',
        ]);

        // إنشاء سجل جديد في قاعدة البيانات
        ProjectRawan::create($validatedData);

        // إعادة التوجيه لصفحة الفورم
        return redirect('/add-project')->with('success', 'تمت إضافة المشروع بنجاح!');
    }
}
