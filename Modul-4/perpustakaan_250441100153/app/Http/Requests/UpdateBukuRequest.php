<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBukuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Ubah menjadi true agar diizinkan
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'kategori_id'  => 'sometimes|required|exists:kategoris,id',
            'judul'        => 'sometimes|required|string|max:255',
            'penulis'      => 'sometimes|required|string|max:255',
            'tahun_terbit' => 'sometimes|required|integer|digits:4',
        ];
    }
}