<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('medical_questions')) {
            Schema::create('medical_questions', function (Blueprint $table) {
                $table->id();
                $table->text('question');
                $table->enum('type', ['open', 'closed'])->default('closed');
                $table->tinyInteger('enabled')->default(YES);
                $table->string('created_by')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('medical_sub_questions')) {
            Schema::create('medical_sub_questions', function (Blueprint $table) {
                $table->id();
                $table->text('question');
                $table->enum('type', ['open', 'closed'])->default('closed');
                $table->string('created_by')->nullable();
                $table->foreignId('medical_question_id')->constrained()->onDelete('cascade');
            });
        }

        if (!Schema::hasTable('medical_questions_answers')) {
            Schema::create('medical_questions_answers', function (Blueprint $table) {
                $table->id();
                $table->json('answers');
                $table->text('remarks')->nullable();
                $table->foreignId('patient_id')->constrained()->onDelete('cascade');
                $table->foreignId('appointment_id')->constrained()->onDelete('cascade');
                $table->integer('doctor_id')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_sub_questions');
        Schema::dropIfExists('medical_questions');
        Schema::dropIfExists('medical_questions_answers');
    }
}
