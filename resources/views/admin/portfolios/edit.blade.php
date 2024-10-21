@extends('admin.layouts.app')

@section('content')
    <h1>Edit Portofolio</h1>

    <form action="{{ route('portfolios.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="project_name">Nama Proyek:</label>
            <input type="text" class="form-control" name="project_name" value="{{ $portfolio->project_name }}" required>
        </div>

        <div class="form-group">
            <label for="client">Nama Partner:</label>
            <input type="text" class="form-control" name="client" value="{{ $portfolio->client }}" required>
        </div>

        <div class="form-group">
            <label for="project_date">Tanggal Proyek:</label>
            <input type="date" class="form-control" name="project_date" value="{{ $portfolio->project_date }}" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi:</label>
            <textarea class="form-control" name="description" required>{{ $portfolio->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Gambar Proyek (opsional):</label>
            <input type="file" class="form-control" name="image">
            @if($portfolio->image)
                <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->project_name }}" width="100">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
