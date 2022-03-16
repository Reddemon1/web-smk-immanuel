<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestedEventRequest extends FormRequest
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
            'name'=>['required'],
            'image'=>['required'],
            'description'=>['required'],
            'start_time'=>['required'],
            'end_time'=>['required'],
            'user_id'=>['required'],
            'category_id'=>['required'],
            'place_id'=>['required'],
        ];
    }
}
