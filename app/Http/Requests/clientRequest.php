<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class clientRequest extends FormRequest
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
        return [
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'business_name' => 'required|string',
            'cnpj' => 'required|string',
            'phone' => 'required',
            'zipcode' => 'required',
            'address_name' => 'required|string',
            'address_number' => 'required|numeric',
            'state' => 'required|string',
            'district' => 'required|string',
            'city' => 'required|string',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'name.string' => 'No campo nome somente é permitido digitar letras',
            'email.required' => 'O campo e-mail é obrigatório',
            'email.email' => 'O campo e-mail está inválido, verifique os dados e tente novamente',
            'password.required' => 'O campo senha é obrigatório',
            'password.min' => 'O campo senha deve conter no mínimo 8 digitos',
            'business_name.required' => 'O campo razão social é obrigatório',
            'cnpj.required' => 'O campo CNPJ é obrigatório',
            'phone.required' => 'O campo Whatsapp é obrigatório',
            'zipcode.required' => 'O campo CEP é obrigatório',
            'address_name.required' => 'O campo Endereço é obrigatório',
            'address_number.required' => 'O campo número do endereço é obrigatório',
            'address_number.numeric' => 'No campo número do endereço somente é permitido digitar números',
            'state.required' => 'O campo Estado é obrigatório',
            'district.required' => 'O campo Bairro é obrigatório',
            'city.required' => 'O campo Cidade é obrigatório',
        ];
    }
}
