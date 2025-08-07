<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Models\Leave;
use App\Models\TimeLog;

class timeLogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->isMethod('post')) {
        return [
            'task_added_on' => 'required|date|before_or_equal:today',
            'task_description' => 'required|string|max:255',
            'hours' => 'required|integer|min:0|max:10',
            'minutes' => 'required|integer|min:0|max:59',
        ];
        }

        return [];
    }

    public function withValidator(Validator $validator)
    {
        if ($this->isMethod('post')) {
        $validator->after(function ($validator) {
            $userId = $this->user()->id;
            $logDate = $this->input('task_added_on');
            $newMinutes = $this->input('hours') * 60 + $this->input('minutes');
            $editingId = $this->input('id');
            
            $onLeave = Leave::where('user_id', $userId)
                ->where('start_date', '<=', $logDate)
                ->where('end_date', '>=', $logDate)
                ->exists();

            if ($onLeave) {
                $validator->errors()->add('task_added_on', 'You are on leave this day and cannot log tasks.');
            }

           
            $existingMinutes = TimeLog::where('user_id', $userId)
                ->where('task_added_on', $logDate)
                ->when($editingId, function ($query) use ($editingId) {
                    $query->where('id', '!=', $editingId); // Exclude current log if editing
                })
                ->get()
                ->sum(fn($t) => $t->hours * 60 + $t->minutes);

            

            if (($existingMinutes + $newMinutes) > 600) {
                $validator->errors()->add('minutes', 'Daily cap of 10 hours exceeded.');
            }
        });
        }
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                
            ], 422)
        );
    }
}
