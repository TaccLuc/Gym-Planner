<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreMovementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255|unique:movements,name',
            'reps' =>'nullable|numeric|max:255',
            'max_weight' => 'nullable|numeric|max:65535',
            'user_id' => 'required|exists:users,id'
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Change name. You can register an exercise only once.'
        ];
    }
}
