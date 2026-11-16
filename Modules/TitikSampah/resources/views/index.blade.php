@extends('layouts.app')
@section('title', 'Daftar Titik Sampah')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Daftar Titik Sampah</h4>
    @if (auth()->user()->isAdmin())
        <a href="{{ route('titiksampah.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah Titik Sampah</a>
    @endif
</div>

<div class="card mb-3">
    <div class="card-body">
        <form method="GET" action="{{ route('titiksampah.index') }}" class="row g-2">
            <div class="col-md-4">
                <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Cari titik sampah...">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-secondary w-100">Cari</button>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama TPS</th>
                    <th>Kecamatan</th>
                    <th>Deskripsi</th>
                    <th>Kapasitas(Kg)</th>
                    @if (auth()->user()->isAdmin())
                        <th class="text-end">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse ($sampahs as $sampah)
                    <tr>
                        <td>{{ $sampahs->firstItem() + $loop->index }}</td>
                        <td class="fw-bold">{{ $sampah->nama_tps }}</td>
                        <td>{{ $buku->kecamatan }}</td>
                        <td>{{ $buku->deskripsi }}</td>
                        <td>{{ $buku->kapasitas_kg }}</td>
                        @if (auth()->user()->isAdmin())
                            <td class="text-end">
                                <a href="{{ route('titiksampah.edit', $buku) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('titiksampah.destroy', $buku) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus titik ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr><td colspan="{{ auth()->user()->isAdmin() ? 7 : 6 }}" class="text-center py-4">Belum ada titik sampah.</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $sampahs->links() }}
    </div>
</div>
@endsection