<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
            //
            'website_name' => ['string','required'],
            'logo' => ['image', 'nullable', 'mimes:png,jpeg,jpg', 'max:2048'],
            'address' => ['string', 'nullable'],
            'phone' => ['string', 'nullable'],
            'email' => ['string', 'nullable'],
            'about' => ['string', 'required'],
        ];
    }
}
