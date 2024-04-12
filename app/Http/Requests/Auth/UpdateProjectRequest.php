<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'title'=> 'required|string|max:150',
            'link'=> 'required|url',
            'description'=> 'required|string',
            'type_id'=>'required|exists:types,id',
            'technologies' =>'required|exists:technologies,id',
            'image' =>'nullable|image'

        ];
    }

    public function messages()
    {
        return [
            'title.required'=> 'Il titolo è obbligatorio',
            'title.string'=> 'Il titolo deve essere una stringa',
            'title.max'=> 'Il titolo deve avere massimo 150 caratteri',

            'link.required'=> 'Il link è obbligatorio',
            'link.url'=> 'Il link deve essere un URL',

            'description.required'=> 'La descrizione è obbligatoria',
            'description.string'=> 'La descrizione deve essere una stringa',

            'type_id.exists'=> 'Il Type non esiste',
            'type_id.required'=> 'Campo obbligatorio',

            'technologies.required'=>'Campo obbligatorio',
            'technologies.exists'=>'Campo obbligatorio',

            'image.image'=>'File non valido',

        ];
    }
}
