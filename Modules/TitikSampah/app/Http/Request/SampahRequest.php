<?php

namespace Modules\TitikSampah\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SampahRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isAdmin() ?? false;
    }

    public function rules(): array
    {
        return [
            'nama_tps' => ['required', 'string', 'max:255'],
            'kecamatan' => ['required', 'string', 'max:255'],
            'deskripsi' => ['string', 'max:255'],
            'kapasitas_kg' => ['integer', 'min:0'],
        ];
    }
}