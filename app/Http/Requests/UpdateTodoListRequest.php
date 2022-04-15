<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTodoListRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            // 'subject' => ['required', Rule::unique('todos')->ignore($this->id)],
            'subject' => "unique:todos,subject,{$this->id}|max:255|required",
            'deadline' => 'required',
        ];
    }
}
