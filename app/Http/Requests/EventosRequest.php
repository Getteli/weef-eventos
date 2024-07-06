<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventosRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:255',
            'date_evento' => 'required|date',
            'estado' => 'required|max:255',
            'cidade' => 'required|max:255',
            'cep' => 'required|max:10',
            'endereco' => 'required|max:255',
            'numero' => 'required|max:10',
            'complemento' => 'max:255',
            'telefone' => 'required|max:20',
            'imagem' => 'nullable|image|mimes:jpeg,png|max:2048',
        ];
    }
}