<?php

namespace App\Http\Requests;

use App\Helpers\UploadedTempFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UploadCardRequest.
 */
class UploadCardRequest extends FormRequest
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
            'card' => ['required'],
        ];
    }

    public function validateCard()
    {
        $data = $this->only('card');

        if (!empty($data['card'])) {
            $data['card'] = new UploadedTempFile($data['card']);
        } else {
            $data['card'] = false;
        }

        return $data['card'];
    }
}