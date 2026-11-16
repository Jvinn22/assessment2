<?php

namespace Modules\Laporan\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaporanRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        $laporan = $this->route('laporan');
        return [
            'user_id' => ['required', 'string', 'max:255'],
            'titik_sampah_id' => ['required', 'string', 'max:255'],
            'volume_sampah' => ['required', 'date'],
            'status_kondisi' => ['required', 'date', 'after_or_equal:tanggal_pinjam'],
            'deskripsi' => ['required', 'in:Dipinjam,Dikembalikan'],
            'foto_bukti' => [$laporan ? 'nullable' : 'required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
        ];
    }
}