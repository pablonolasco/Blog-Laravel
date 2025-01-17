<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //solo personas logeadas pueden ejecutar esta accion 
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // foro existente
            'forum_id'=>'required|exists:forums,id',
            'title'=>'required|unique:posts|max:100',
            'description'=>'required'
        ];
    }
}
