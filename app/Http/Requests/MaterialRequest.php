<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
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
          'codigo' => 'required|string',
          'num_requisicao' => 'required|integer|min:1',
          'ordem_compra' => 'required|integer|min:1',
          'fornecedor' => 'required',
          'nome' => 'required',
          'qtd_solicitada' => 'nullable|integer|min:1',
          'qtd_recebida' => 'required|integer|min:1',
          'custo' => 'nullable',
          'comentario' => 'nullable',
      ];
    }
}
