<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class InfoRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
          'phone' => 'required|string|min:9|max:16',
          'phoneAlt' => 'required|string|min:9|max:16',
          'email' => 'required|email|max:191',
          'address_en' => 'required|string',
          'address_pa' => 'required|string',
          'address_fa' => 'required|string',
          'facebook' => 'required|url',
          'twitter' => 'required|url',
        ];
    }
}
