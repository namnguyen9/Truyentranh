<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormExampleRequest extends FormRequest
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
            //
        'name'=>'required| min:2 | unique:mangas,name,'.$this->id,
        'author'=>'required| string | min:2',
        'content'=>'required',
        'status'=>'required | string',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Vui lòng nhập tên',
            'name.min'=>'Vui lòng nhập tối thiểu là 2 kí tự',
            'name.unique'=>'Tên Manga đã tồn tại',
            'author.required'=>'Vui lòng nhập tác giả',
            'author.min'=>'Vui lòng nhập tối thiểu là 2 kí tự',
            'content.required'=>'Vui lòng nhập nội dung',
            'status.required'=>'Vui lòng nhập trạng thái',
        ];
    }
}
