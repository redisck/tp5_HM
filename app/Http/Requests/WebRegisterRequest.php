<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class WebRegisterRequest extends Request
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
    // 规则
    public function rules()
    {
        return [
            //
            'username'=>"required|unique:users",
            'password'=>"required",
            'repassword'=>"required|same:password",
            'email'=>"required|email|unique:users",
            'vcode'=>'required',
        ];
    }

    //规则描述
    public function messages(){
        return [
        'username.required'=>'用户名不能为空',
        'username.unique'=>'用户名已存在',
        'password.required'=>'密码不能为空',
        'repassword.required'=>'重复密码不能为空',
        'repassword.same'=>'两次密码不相同',
        'email.required'=>'邮箱不能为空',
        'email.email'=>'邮箱格式不对',
        'email.unique'=>'邮箱已被注册',
        'vcode.required'=>'验证码不能为空',

        ];
    }
}
