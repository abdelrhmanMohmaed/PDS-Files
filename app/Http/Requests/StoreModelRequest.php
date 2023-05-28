<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreModelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    { 
        return [
            'companies' => 'required|string|exists:companies,id',
            'model' => 'required|string|min:3|max:30|unique:models,name',
        ];
    }

    public function messages(): array
    {
        return [
            'model.unique' => 'Model already Exists',
        ];
    }
}
