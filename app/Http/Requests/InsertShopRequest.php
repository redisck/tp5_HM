<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class InsertShopRequest extends Request
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
            'name'=>"required",
            'cate_id'=>"required",
            'price'=>"required",
            'oldprice'=>"required",
            'store'=>"required",
            'status'=>"required",
            'pic'=>"required",
            'content'=>"required",
        ];
    }

    //规则描述
    public function messages(){
        return [
        'name.required'=>'名字不能为空',
        'cate_id.required'=>'类别不能为空',
        'price.required'=>'现价不能为空',
        'oldprice.required'=>'原价不能为空',
        'store.required'=>'库存量不能为空',
        'status.required'=>'状态不能为空',
        'pic.required'=>'图片不能为空',
        'content.required'=>'内容不能为空',

        ];
    }
}
