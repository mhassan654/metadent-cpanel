<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\MedicalQuestion;
use Illuminate\Http\Request;
use App\Services\MedicalQuestions\MedicalQuestionsService;
use Illuminate\Support\Facades\DB;

class MedicalQuestionController extends Controller
{

    private $medicalQuestionsService;

    public function __construct(MedicalQuestionsService $medicalQuestionsService)
    {
        $this->medicalQuestionsService = $medicalQuestionsService;
    }

    public function index()
    {
        $questions = MedicalQuestion::with('subQuestions')->latest()->paginate();
        return $this->customSuccessResponseWithMessage('', $questions);
    }

    public function index_v2()
    {
        $questions = MedicalQuestion::with('subQuestions')->latest()->get();
        return $this->customSuccessResponseWithMessage('', $questions);
    }

    public function save_question(Request $request)
    {
        try {
            $rules = ['question' => 'required'];
            Helper::custom_validator($request->all(), $rules);
            DB::beginTransaction();
            $status =  $this->medicalQuestionsService->save(
                $request->question_id,
                $request->question,
                $request->sub_question,
                $request->type,
                $request->enabled
            );
            if ($status) {
                DB::commit();
                return $this->customSuccessResponseWithMessage($status == 'saved' ? 'Saved successfully' : "Updated successfully");
            }
            throw new \Exception('Could not save question');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->customFailResponseMessage($th->getMessage());
        }
    }

    public function view()
    {
        try {
            $question = $this->medicalQuestionsService->get_question(request('question_id'));
            return $this->customSuccessResponseWithMessage('Retrieved successfully', $question);
        } catch (\Throwable $th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }

    public function destroy()
    {
        try {
            $question = $this->medicalQuestionsService->delete(request('question_id'));

            return $this->customSuccessResponseWithMessage('Deleted successfully', $question);
        } catch (\Throwable $th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }
}
