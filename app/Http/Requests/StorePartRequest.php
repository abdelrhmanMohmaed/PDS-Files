<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePartRequest extends FormRequest
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
            'com' => 'required|string|exists:companies,id',
            'mod' => 'required|string|exists:models,id',
            'part_num' => 'required|string|min:3|max:16',
        ];
    } 
}
