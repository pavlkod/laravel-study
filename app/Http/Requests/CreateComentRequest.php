<?php

// php artisan make:request CreateComentRequest

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateComentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        /*$ЬlogPostld = $this->route('ЫogPost');

        return auth()->check() && BlogPost::where('id', $ЫogPostid)
        ->where('user_id', auth()->id())->exists(); */

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'body' => 'required|max:1000',
        ];
    }
}
