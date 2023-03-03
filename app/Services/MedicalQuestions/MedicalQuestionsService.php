<?php

namespace App\Services\MedicalQuestions;

use App\Models\MedicalQuestion;
use App\Models\MedicalSubQuestion;
use Illuminate\Database\Eloquent\Model;

class MedicalQuestionsService
{

    public function save($question_id, string $question,  $sub_question = '', $type = CLOSED, $enabled = YES)
    {
        if ($main_question = $this->update_question($question_id, $question,  $sub_question, $type, $enabled)) {
            return "updated";
        } else {
            $saved = false;
            $main_question = $this->save_main_question($question, $type, $enabled);
            if ($main_question) {
                $saved = true;
                if ($sub_question) {
                    $this->save_sub_question($main_question->id, $sub_question, $type);
                }
            }
            return "saved";
        }
    }

    public function save_main_question(string $question, $type = null, $enabled = null)
    {
        $stored_question = MedicalQuestion::where('question', $question)->first();
        if ($stored_question) {
            throw new \Exception('Question already exists');
        }

        $medical_question = new MedicalQuestion;
        $medical_question->question = $question;
        $medical_question->type = $type ?? CLOSED;
        $medical_question->enabled = $enabled ?? YES;
        if ($medical_question->save()) return $medical_question;
        return null;
    }

    public function update_question($question_id, string $question,  $sub_question = '', $type = CLOSED, $enabled = YES)
    {
        $medical_question = MedicalQuestion::find($question_id);
        if ($medical_question) {
            $medical_question->question = $question;
            $medical_question->type = $type;
            $medical_question->enabled = $enabled;
            $medical_question->save();
            return $medical_question;
        }
        return null;
    }

    public function change_status(int $question_id, int $state)
    {
        $question = $this->get_question($question_id);
        $question->enabled = $state;
        return $question->save();
    }

    public function change_type(int $question_id, string $type)
    {
        $question = $this->get_question($question_id);
        $question->type = $type;
        return $question->save();
    }

    public function save_sub_question(int $medical_question_id, string $question, $type = null, $created_by = null)
    {
        $medical_sub_question = new MedicalSubQuestion;
        $medical_sub_question->question = $question;
        $medical_sub_question->type = $type ?? OPEN;
        $medical_sub_question->created_by = $created_by;
        $medical_sub_question->medical_question_id = $medical_question_id;

        return $medical_sub_question->save();
    }

    public function delete(int $question_id): bool
    {
        $question = $this->get_question($question_id);
        return $question->delete();
    }

    public function get_question(int $question_id): Model
    {
        $question = MedicalQuestion::with('subQuestions')->where('id', $question_id)->first();
        if (!$question) {
            throw new \Exception('Question does not exist');
        }
        return $question;
    }
}
