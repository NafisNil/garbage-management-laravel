<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|max:40',
            'city_corporation' => 'required',

            'thana' => 'required',
            'ward' => 'required',
            'road' => 'required',
            'house' => 'required',
            'flat' => 'required',
            'phone' => 'required|numeric',
            'logo' => 'mimes:jpg,png,jpeg'
        ];
    }
}
