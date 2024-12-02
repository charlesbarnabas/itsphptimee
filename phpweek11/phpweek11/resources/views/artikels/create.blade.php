@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Buat Artikel Baru</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('artikels.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Judul Artikel</label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" 
                               required value="{{ old('judul') }}">
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Isi Artikel</label>
                        <textarea name="isi" class="form-control @error('isi') is-invalid @enderror" 
                                  rows="5" required>{{ old('isi') }}</textarea>
                        @error('isi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Penulis</label>
                        <input type="text" name="penulis" class="form-control @error('penulis') is-invalid @enderror" 
                               required value="{{ old('penulis') }}">
                        @error('penulis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Simpan Artikel
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection