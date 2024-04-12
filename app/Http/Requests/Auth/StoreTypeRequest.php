<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeRequest extends FormRequest
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
            'label'=> 'required|string|max:30',
            'color'=> ['required', 'regex:/^#([a-f0-9]{6}|[a-f0-9]{3})$/'],
        ];
    }

    public function messages()
    {
        return [
            'label.required'=> 'La Label è obbligatoria',
            'label.string'=> 'La Label deve essere una stringa',
            'label.max'=> 'La Label deve avere massimo 30 caratteri',

            'color.required'=> 'Il colore è obbligatorio',
            'color.regex'=> 'Il colore deve essere un esadecimale',
        ];
    }
}
