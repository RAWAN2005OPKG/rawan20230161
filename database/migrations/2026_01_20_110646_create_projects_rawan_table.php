<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects_rawan', function (Blueprint $table) {
            $table->id('project_id'); //  رقم متسلسل
            $table->string('student_id'); // رقم الطالب
            $table->string('name'); // الاسم
            $table->string('governorate'); // المحافظة
            $table->string('project_idea'); // فكرة المشروع
            $table->text('project_details'); // تفاصيل المشروع
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects_rawan');
    }
};

