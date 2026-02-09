<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstadiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // canvia a true per poder enviar formularis
    }

    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'ciutat' => 'required|string|max:255',
            'capacitat' => 'required|integer|min:0',
            'equip_principal_id' => 'nullable|exists:equips,id',
        ];
    }
}
