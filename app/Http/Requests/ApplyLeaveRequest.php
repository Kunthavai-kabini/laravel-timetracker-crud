<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

use App\Models\TimeLog;

class ApplyLeaveRequest extends FormRequest
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
    public function rules()
    {
        if ($this->isMethod('post')) {
        return [
            'start_date' => 'required|date|before_or_equal:end_date|before_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date|before_or_equal:today',
            'comments' => 'nullable|string|max:255', // optional
        ];
        }

        return [];
    }
    public function withValidator($validator)
    {
        if ($this->isMethod('post')) {
            $validator->after(function ($validator) {
                $userId = $this->user()->id;
                $startDate = $this->input('start_date');
                $endDate = $this->input('end_date');

                $conflict = TimeLog::where('user_id', $userId)
                    ->whereBetween('task_added_on', [$startDate, $endDate])
                    ->exists();

                if ($conflict) {
                    $validator->errors()->add('end_date', "You have logged work between $startDate and $endDate. Please select different dates");
                }
            });
        }
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
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
