<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Products;

class CreateProductsRequest extends FormRequest
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
        $existingValidationsAsPerModel = Products::$rules;

        $existingValidationsAsPerModel['sub_category_id'] = 'required|exists:categories,id';

        return $existingValidationsAsPerModel;
    }
}
