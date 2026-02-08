<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        return [
            'titulo' => 'required|min:5',
            'contenido' => 'required|min:50',
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'El títol és obligatori.',
            'titulo.min' => 'El títol ha de tenir almenys 5 caràcters.',
            'contenido.required' => 'el contingut és obligatori.',
            'contenido.min' => 'El contingut ha de tenir almenys 50 caràcters.',
        ];
    }
}
