<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
          'subtitle_en' => 'required|string|max:191',
          'subtitle_pa' => 'required|string|max:191',
          'subtitle_fa' => 'required|string|max:191',
          'image' => 'image'
        ];
    }
}
