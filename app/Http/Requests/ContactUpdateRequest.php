<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
//        return request()->user()->check();
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
            'name' => 'required|string|min:6',
            'email' => 'required|email|unique:\App\Models\Contact,email,'. $this->route('id'),
            'phone_number' => 'required|integer|digits:9|unique:\App\Models\Contact,phone_number,'. $this->route('id'),
        ];
    }
}
