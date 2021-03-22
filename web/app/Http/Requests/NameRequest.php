<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Myrule;

class NameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
     return [
         'name' => "ページが見つかりませんでした",
     ];   
    }
    public function messages(){
        return [
            'name.name' => '正しい名前で入力されていません',
        ];
    }
}
