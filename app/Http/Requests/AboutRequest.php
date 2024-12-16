<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            "decentralisation" => "required|string",
            
            
            "image" => "required|mimes:png,jpg,jpeg,jfif,webp"
        ];
    }
    public function messages(): array
    {
        return [
            "decentralisation.required" => "Une description est requise.",
            
            
            "image.required" => "Veuillez ajoutez une image.",
            "image.mimes" => "Le format de l'image n\'est pas pris en charge."
        ];
    }
}
