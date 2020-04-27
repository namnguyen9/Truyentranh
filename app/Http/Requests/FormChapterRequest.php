<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormChapterRequest extends FormRequest
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
        'title'=>'required| min:2',
        'chapter'=>'required |integer',
        'content'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Vui lòng nhập title',
            'title.min'=>'Vui lòng nhập tối thiểu là 2 kí tự',
            'chapter.required'=>'Vui lòng nhập số chapter',
            'chapter.integer'=>'Vui lòng nhập  số',
            'chapter.unique'=>'Số chapter đã tồn tại',
            'content.required'=>'Vui lòng nhập nội dung',
        ];
    }
}
