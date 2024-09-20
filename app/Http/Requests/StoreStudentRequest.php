<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // You can add authorization logic here. Return true if no specific authorization is required.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'ssn' => ['required', 'string', 'max:255'], 
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'regex:/^(?:\+20|0020|0)?1[0125][0-9]{8}$/'],
            'img' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
           
        ];
    }

    /**
     * Get the custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'ssn.required' => 'The SSN is required.',
            'fname.required' => 'The first name is required.',
            'lname.required' => 'The last name is required.',
            'email.required' => 'The email address is required.',
            'phone.required' => 'The phone number is required.',
            'phone.regex' => 'The phone number format is invalid.',
            'img.image' => 'The uploaded file must be an image.',
            'img.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
        
        ];
    }
    public function attributes(){
        return['fname'=>'First Name'];
        
    }
}
