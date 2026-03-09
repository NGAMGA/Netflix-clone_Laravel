<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
        'title' => 'required|string|max:255',
        'year' => 'required|integer|min:1800|max:2026',
        'rating' => 'required|numeric|min:0|max:10',
        'genres' => 'required|string',
        'image_url' => 'nullable|url',
        'description' => 'required|string|min:10',
    ];
    }
}
