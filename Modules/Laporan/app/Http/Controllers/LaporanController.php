<?php

namespace Modules\Peminjaman\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Modules\Laporan\Http\Requests\LaporanRequest;
use Modules\Laporan\Models\Laporan;

class LaporanController extends Controller
{
    public function index(): View
    {
        return view('Laporan::index');
    }

    public function getData(): JsonResponse
    {
        return response()->json(Laporan::latest()->get());
    }

    public function store(LaporanRequest $request): JsonResponse
    {
        $data = $request->safe()->except('foto_bukti');
        if ($request->hasFile('foto_bukti')) {
            $data['foto_bukti'] = $request->file('foto_bukti')->store('foto_bukti', 'public');
        }

        Laporan::create($data);
        return response()->json(['success' => 'Laporan berhasil dicatat.']);
    }

    public function edit(Laporan $laporan): JsonResponse
    {
        return response()->json($laporan);
    }

    public function update(LaporanRequest $request, Laporan $laporan): JsonResponse
    {
        $data = $request->safe()->except('foto_bukti');
        if ($request->hasFile('foto_bukti')) {
            if ($laporan->foto_bukti) {
                Storage::disk('public')->delete($laporan->foto_bukti);
            }
            $data['foto_bukti'] = $request->file('foto_bukti')->store('foto_bukti', 'public');
        }

        $laporan->update($data);
        return response()->json(['success' => 'Data laporan berhasil diperbarui.']);
    }

    public function destroy(Laporan $laporan): JsonResponse
    {
        if ($laporan->foto_bukti) {
            Storage::disk('public')->delete($laporan->foto_bukti);
        }
        $laporan->delete();
        return response()->json(['success' => 'Data laporan berhasil dihapus.']);
    }
}