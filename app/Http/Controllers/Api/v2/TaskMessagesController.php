<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\TaskMessage;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;

class TaskMessagesController extends Controller
{
    public function __construct()
    {
//        $this->middleware(["auth:api"]);
    }

    public function index()
    {
        try {
            $final_messages = [];
            $messages = TaskMessage::orderBy('id','DESC')->get();
            foreach($messages as $message){
                $message->task = Task::where('id', $message->task_id)->first(['id','title','due_date','created_by','read']);
                $message->mentions = json_decode($message->mentions) != null ? Employee::whereIn('id',json_decode($message->mentions))->get(['id','first_name','last_name'])->makeHidden(['roles','permissions']) : null;
                $message->sent_by = Employee::where('id',$message->sent_by)->first(['id','first_name','last_name'])->makeHidden(['roles','permissions']);
                $final_messages[] = $message;
            }
            return $this->customSuccessResponseWithPayload($final_messages);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function store()
    {
        try {

            $validator = Validator::make(request()->all(),[
                'taskId' => 'required|integer|exists:App\Models\Task,id',
                'message' => 'string|required',
                'time' => 'string',
                'sentBy' => 'integer|required|exists:App\Models\Employee,id',
                'mentions' => 'nullable|array',
                'mentions.*' => 'integer',
                'read' => 'nullable|boolean'
            ]);

            if ($validator->fails()) {
                return $this->customFailResponseWithPayload($validator->errors()->all());
            }

            $message = TaskMessage::create([
                'task_id' => request()->taskId,
                'message' => request()->message,
                'time' => request()->time,
                'sent_by' => request()->sentBy,
                'mentions' => json_encode(request()->mentions),
                'read' => request()->read
            ]);

            if ($message) {
                $message_to_return = [
                    'id' => $message->id,
                    'time' => $message->time,
                    'read' => $message->read,
                    'message' => $message->message,
                    'mentions' => json_decode($message->mentions),
                    'task' => Task::where('id',$message->task_id)->first(['id','title','task','due_date','created_by','read']),
                    'sent_by' => Employee::where('id',$message->sent_by)->first(['id','first_name','last_name'])->makeHidden(['roles','permissions']),
                ];
                return $this->customSuccessResponseWithPayload($message_to_return);
            }

            return $this->customFailResponseWithPayload('Message not Created');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function update()
    {
        try {

            $validator = Validator::make(request()->all(),[
                'taskId' => 'required|integer|exists:App\Models\Task,id',
                'message' => 'string|required',
                'time' => 'string',
                'sentBy' => 'required|integer|exists:App\Models\Employee,id',
                'mentions' => 'nullable|array',
                'mentions.*' => 'integer',
                'messageId' => 'required|integer',
                'read' => 'nullable|boolean'
            ]);

            if ($validator->fails()) {
                return $this->customFailResponseWithPayload($validator->errors()->all());
            }

            $message = TaskMessage::find(request()->messageId);

            if ($message){
                $message->task_id = request()->taskId;
                $message->message = request()->message;
                $message->time = request()->time;
                $message->sent_by = request()->sentBy;
                $message->mentions = request()->mentions;
                $message->read = request()->read;
                $message->update();
                if($message){
                    $message_to_return = [
                        'id' => $message->id,
                        'time' => $message->time,
                        'read' => $message->read,
                        'message' => $message->message,
                        'mentions' => json_decode($message->mentions),
                        'task' => Task::where('id',$message->task_id)->first(['id','title','task','due_date','created_by','read']),
                        'sent_by' => Employee::where('id',$message->sent_by)->first(['id','first_name','last_name'])->makeHidden(['roles','permissions']),
                    ];
                    return $this->customSuccessResponseWithPayload($message_to_return);
                }
            }
            return $this->customFailResponseWithPayload('Not Updated');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function destroy()
    {
        try {
            $validator = Validator::make(request()->all(),[
                'messageId' => 'required|integer'
            ]);

            if ($validator->fails()) {
                return $this->customFailResponseWithPayload($validator->errors()->all());
            }

            $message = TaskMessage::find(request()->messageId);

            if ($message) {
                $message->delete();
                return $this->customSuccessResponseWithPayload('Deleted');
            }
            return $this->customFailResponseWithPayload('Not Found');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }

    }

    public function task_messages()
    {
        try {
            $validator = Validator::make(request()->all(),[
                'taskId' => 'required|integer'
            ]);

            if ($validator->fails()) {
                return $this->customFailResponseWithPayload($validator->errors()->all());
            }
            $final_messages = [];
            $messages = TaskMessage::where('task_id',request()->taskId)->orderBy('id','DESC')->get();
            foreach($messages as $message){
                $message->mentions = json_decode($message->mentions) != null ? Employee::whereIn('id',json_decode($message->mentions))->get(['id','first_name','last_name'])->makeHidden(['roles','permissions']) : null;
                $message->sent_by = Employee::where('id',$message->sent_by)->first(['id','first_name','last_name'])->makeHidden(['roles','permissions']);
                unset($message->task_id);
                $final_messages[] = $message;
            }
            return $this->customSuccessResponseWithPayload($final_messages);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
}
