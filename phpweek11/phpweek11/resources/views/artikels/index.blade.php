@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Artikel Terkini</h2>
                <a href="{{ route('artikels.create') }}" class="btn btn-light">
                    <i class="fas fa-plus"></i> Buat Artikel Baru
                </a>
            </div>
            
            <div class="card-body">
                @if($artikels->isEmpty())
                    <div class="alert alert-info text-center">
                        Belum ada artikel yang dibuat
                    </div>
                @else
                    @foreach($artikels as $artikel)
                    <div class="card mb-3 border-primary">
                        <div class="card-body">
                            <h4 class="card-title text-primary">{{ $artikel->judul }}</h4>
                            <p class="card-text text-muted">
                                {{ Str::limit($artikel->isi, 200) }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    Ditulis oleh: {{ $artikel->penulis }}
                                </small>
                                <span class="badge bg-info text-white">
                                    {{ $artikel->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection