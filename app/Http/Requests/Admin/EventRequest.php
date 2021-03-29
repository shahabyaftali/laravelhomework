<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
          'title' => 'required|max:191',
          'address' => 'required|max:191',
          'image' => 'image', 
          'date' => 'required|date',
          'description' => 'required',
          'excerpt' => 'required',
          'language' => 'required'
        ];
    }
}
