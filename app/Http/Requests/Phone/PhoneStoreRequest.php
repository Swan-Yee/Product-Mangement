<?php

namespace App\Http\Requests\Phone;

use Illuminate\Foundation\Http\FormRequest;

class PhoneStoreRequest extends FormRequest
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
            'model_name' => 'required|string|max:255',
            'model_number' => "required|string|max:255",
            'description' => "required|string|max:255",
            'operation_system_id' => "required|integer",
            'processor_id' => "required|integer",
            'color_id' => "required|integer",
            'brand_id' => "required|integer",
        ];
    }
}
