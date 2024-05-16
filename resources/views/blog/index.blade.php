@extends('layouts.main')

@section('container')
    <h1 class="mb-3">Blog Postingan Anda</h1>
    <a href="{{ url('blog/create') }}" class="btn btn-secondary mb-3"><i class="fa-solid fa-plus"></i> Tambah Post Blog</a>
    <div class="row justify-content-center">
        @foreach ($blogs as $blog)
            <div class="card mb-3 me-3" style="width: 25rem;">
                <div class="card-body">
                    <h4 class="card-title">{{ $blog->title }}</h4>
                    <p class="card-text">{{ Str::limit($blog->content, 50, '...') }}</p>
                    <p class="card-text">{{ $blog->slugg }}</p>
                    <p>
                        <small>Di buat : <b>{{ $blog->author }}</b> pada {{ $blog->updated_at }}</small>
                    </p>
                    <a href="{{ url('blog/' . $blog->slug) }}" class="btn btn-primary">Selengkapnya</a>
                    <a href="{{ url('blog/' . $blog->slug) }}/edit" class="btn btn-secondary">edit</a>
                    <form action="{{ url('blog/' . $blog->slug) }}" class="d-inline" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-warning" onclick="return confirm('anda yakin')">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
