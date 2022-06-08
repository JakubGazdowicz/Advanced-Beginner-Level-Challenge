<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'string|required',
            'description' => 'string|required',
            'user_id' => 'integer|required',
            'client_id' => 'integer|required',
            'project_id' => 'integer|required',
            'deadline' => 'date|required',
            'status' => 'string|required'
        ];
    }
}
