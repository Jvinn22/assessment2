<?php

namespace Modules\Buku\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\TitikSampah\Http\Requests\SampahRequest;
use Modules\TitikSampah\Models\Sampah;

class TitikSampahController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->string('search')->trim()->toString();
        $sampahs = Sampah::query()
            ->when($search !== '', function ($q) use ($search) {
                $q->where('nama_tps', 'like', "%{$search}%")
                    ->orWhere('kecamatan', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('titiksampah::index', compact('sampahs', 'search'));
    }

    public function create()
    {
        return view('titiksampah::create');
    }

    public function store(SampahRequest $request)
    {
        Sampah::create($request->validated());
        return redirect()->route('titiksampah.index')->with('success', 'Titik sampah berhasil ditambahkan.');
    }

    public function edit(Sampah $buku)
    {
        return view('titiksampah::edit', compact('sampah'));
    }

    public function update(SampahRequest $request, Sampah $sampah)
    {
        $sampah->update($request->validated());
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Sampah $sampah)
    {
        $sampah->delete();
        return redirect()->route('titiksampah.index')->with('success', 'Titik sampah berhasil dihapus.');
    }
}