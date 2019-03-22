<?php

namespace App\Http\Requests\Permission;

use Illuminate\Foundation\Http\FormRequest;

class StorePermissionRequest extends FormRequest
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
            'nameCreatePermission'=>'required|unique:permissions,name|max:191',
            'displaynameCreatePermission' => 'required|max:191',
            'sortCreatePermission' => 'required|numeric'
        ];
    }
}
