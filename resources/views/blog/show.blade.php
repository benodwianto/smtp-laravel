@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $blog->title }}</h5>
                    <p class="card-text">{{ $blog->content }}</p>
                    <p>
                        <small>Di buat oleh : {{ $blog->author }} pada {{ $blog->updated_at }}</small>
                    </p>

                    <small class="text-muted">{{ $total_comment }} Komentar</small>
                    @foreach ($comment as $coment)
                        <div class="card mb-3">
                            <div class="card-body">
                                <p class="card-text border-1">{{ $coment->comment }}</p>
                            </div>
                        </div>
                    @endforeach
                    <a href="{{ url('blog') }}" class="btn btn-primary">Kembali ke postingan</a>
                </div>
            </div>
        </div>
    </div>
@endsection
