<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'short_description' => ['required', 'max:250'],
            'title' => ['required'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'category_id' => 'required',
            'content_post' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'short_description.required' => ':attribute không được phép trống',
            'short_description.max' => ':attribute không được vượt quá 250 kí tự',
            'title.required' => ':attribute không được phép trống',
            'image.image'   => 'File tài lên phải là jpeg,png,jpg,gif,svg',
            'category_id'   => ':attribute không được phép trống',
            'content_post'  => ':attribute không được phép trống',
        ];
    }
    public function attributes()
    {
        return [
            'short_description'  => 'Mô tả ngắn',
            'title'         => 'Tiêu đề',
            'image'         => 'Hình ảnh',
            'category_id'   => 'Thể loại',
            'content_post' =>'Nội dung',
        ];
    }
    }
