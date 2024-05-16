@extends('layouts.main')

@section('container')
    <div class="container">
        <form action="{{ url('blog') }}" method="post">
            @csrf
            <div class="row d-flex align-items-center justify-content-center">
                <h2 class="text-center mb-3">Tambah Postingan Baru</h2>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                            autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}"
                            autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" class="form-control" placeholder="author" name="author"
                            value="{{ old('author') }}" aria-label="author" aria-describedby="addon-wrapping">
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" aria-label="With textarea" value="{{ old('content') }}" name="content"></textarea>
                    </div>

                    <button class="btn btn-success">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection
