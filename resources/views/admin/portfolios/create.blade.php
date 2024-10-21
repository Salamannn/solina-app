@extends('admin.layouts.app')
@section('content')
    <h1>Tambah Portofolio</h1>

    <form action="{{ route('portfolios.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="project_name">Nama Proyek:</label>
            <input type="text" class="form-control" name="project_name" required>
        </div>

        <div class="form-group">
            <label for="client">Nama Partner:</label>
            <input type="text" class="form-control" name="client" required>
        </div>

        <div class="form-group">
            <label for="project_date">Tanggal Proyek:</label>
            <input type="date" class="form-control" name="project_date" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi:</label>
            <textarea class="form-control" name="description" required></textarea>
        </div>

        <div class="form-group">
            <label for="image">Gambar Proyek (opsional):</label>
            <input type="file" class="form-control" name="images[]" multiple>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection