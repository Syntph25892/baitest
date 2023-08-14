<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhanVienRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [];
        $method = $this->route()->getActionMethod();
        switch ($this->method()) {
            case 'POST':
                switch ($method) {
                    case 'add':
                        $rules = [
                            'ten' => 'required|string',
                            'email' => 'required|email|unique:nhanvien',
                            'tel' => 'regex:/^\d{1,4}-\d{1,4}-\d{1,4}$/|max:14'
                        ];
                        break;
                    case 'edit':
                        $rules = [
                            'ten' => 'required|string',
                            'email' => 'required|email',
                            'tel' => 'regex:/^\d{1,4}-\d{1,4}-\d{1,4}$/|max:14'
                        ];
                        break;
                    default:
                        # code...
                        break;
                }
                break;

            default:
                # code...
                break;
        }
        return $rules;
    }
    public function messages()
    {
        return[
            'ten.required'=>'Không được bo trống tên',
            'email.required'=>'Không được bo trống email',
            'tel.required'=>'Không được bo trống tel',
            'email.email'=>'Email k đúng định dạng',
            'email.unique'=>'Email đã được sử dụng',
            'tel.regex'=>'Tel ko đúng định dạng',
            'tel.max'=>'Tel chỉ đc 14 ký tự'
        ];
    }
}
