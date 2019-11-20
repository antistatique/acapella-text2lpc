<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SaveImagesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'libraryId'   => 'required|integer',
            'imagesInfos' => 'required|array|size:40',
            'imagesInfos.*.key' => 'required',
            'imagesInfos.*.position' => 'required',
            'imagesInfos.*.imagePath' => 'required|temp_imageable'
        ];
    }
}
