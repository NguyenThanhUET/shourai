<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTour extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
            'tour_name'=>'required',
            'destination'=>'required',
             'city_id'=>'required',
             'start_time'=>'required',
             'end_time'=>'required',
             'price'=>'required'
        ];
    }
}
