@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Portofolio</h1>
    <a href="{{ route('portfolios.create') }}" class="btn btn-primary mb-3">Tambah Portofolio</a>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama Proyek</th>
                <th>Nama Partner</th>
                <th>Tanggal Proyek</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($portfolios as $portfolio)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $portfolio->project_name }}</td>
                    <td>{{ $portfolio->client }}</td>
                    <td>{{ $portfolio->project_date }}</td>
                    <td>{{ Str::limit($portfolio->description, 100) }}</td>
                    <td>
                        @if ($portfolio->images->isNotEmpty())
                            <img src="{{ asset('storage/' . $portfolio->images->first()->image_path) }}" width="100" alt="Gambar">
                        @else
                            <span class="text-muted">Tidak ada gambar</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('portfolios.edit', $portfolio->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('portfolios.destroy', $portfolio->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus portofolio ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada portofolio.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection