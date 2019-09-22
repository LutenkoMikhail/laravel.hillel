<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends FormRequest
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
            'customername' => 'required|min:7|max:75',
            'customersurname' => 'required|min:7|max:75',
            'shipping_data_country' => 'required|min:3|max:100',
            'shipping_data_city' => 'required|min:3|max:50',
            'shipping_data_address' => 'required|min:15|max:150',
         ];
    }
}
