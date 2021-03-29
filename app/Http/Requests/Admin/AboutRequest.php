<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
          'title_en' => 'required|string|max:191',
          'title_pa' => 'required|string|max:191',
          'title_fa' => 'required|string|max:191',
          'description_en' => 'required|string',
          'description_pa' => 'required|string',
          'description_fa' => 'required|string',
          'image' => 'image'
        ];
    }
}
