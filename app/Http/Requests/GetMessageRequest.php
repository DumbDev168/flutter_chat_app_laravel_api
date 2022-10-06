<?php

namespace App\Http\Requests;

use App\Models\Chat;
use Illuminate\Foundation\Http\FormRequest;

class GetMessageRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $chatModel = get_class(new Chat());

        return [
            'chat_id' => "required|exists:{$chatModel},id",
            'page' => 'required|numeric',
            'page_size' => 'nullable|numeric',
        ];
    }
}
