<?php

namespace App\Http\Requests;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_name' => 'required|min:6',
            'product_price' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => 'Trường :attribute bất buộc phải nhập',
            'product_name.min' => 'Trường :attribute không được nhỏ hơn :min',
            'product_price.required' => 'Trường :attribute là bắt buộc',
            'product_price.integer' => 'Trường :attribute phải là số'
        ];
    }

    public function attributes()
    {
        return [
            'product_name' => 'tên sản phẩm',
            'product_price' => 'giá sản phẩm',
        ];
    }

    protected function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->count() > 0) {
                $validator->errors()->add('msg', 'Đã có lỗi xảy ra, vui lòng kiểm tra lại');
            }
        });
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'ceate_at' => date('Y-m-d H;i:s'),
        ]);
    }

    protected function failedAuthorization()
    {
        // throw new AuthorizationException('Bạn không có quyền tuy cập');
        // throw new HttpResponseException(redirect('/')->with('msg', 'Bạn không có quyền tuy cập')->with('type','danger'));

        throw new HttpResponseException(abort(404));
    }
}
