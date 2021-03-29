<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PointRequest extends FormRequest
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
          'title1' => 'required',
          'desc1' => 'required',
          'link' => 'nullable',
          'button' => 'nullable',
          'title2' => 'required',
          'desc2' => 'required',
          'img2' => 'image',
          'title3' => 'required',
          'desc3' => 'required',
          'img3' => 'image',
          'title4' => 'required',
          'desc4' => 'required',
          'img4' => 'image',
          'title5' => 'required',
          'desc5' => 'required',
          'img5' => 'image',
        ];
    }
}
