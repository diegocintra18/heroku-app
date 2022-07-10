<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeZendeskVisualization extends FormRequest
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
            'zendesk_visualization_name' => 'required|max:150',
            'zendesk_visualization_id' => 'required',
            'green_range' => 'lte:yellow_range',
            'yellow_range' => 'gte:green_range',
        ];
    }

    public function messages()
    {
       return [
           'zendesk_visualization_name.required' => 'O campo Nome da Visualização é obrigatório!',
           'zendesk_visualization_id.required' => 'O campo Id da Visualização é obrigatório!',
           'green_range.lte' => 'O campo Valor Máximo para a cor verde não pode ser maior que o amarelo',
           'yellow_range.gte' => 'O campo Valor Máximo para a cor amarela não pode ser menor que o verde',
       ];
    }
}
