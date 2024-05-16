@extends('layouts.main')

@section('container')
    <div class="container">
        <form action="{{ url('blog/' . $blog->slug) }}" method="post">
            @csrf
            @method('put')
            <div class="row d-flex align-items-center justify-content-center">
                <h2 class="text-center mb-3">Edit Postingan</h2>
                <div class="col-md-6">
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping">Title</span>
                        <input type="text" class="form-control" placeholder="title" name="title" aria-label="title"
                            value="{{ old('title', $blog->title) }}" aria-describedby="addon-wrapping">
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping">Slug</span>
                        <input type="text" class="form-control" placeholder="title" name="slug" aria-label="slug"
                            value="{{ old('slug', $blog->slug) }}" aria-describedby="addon-wrapping">
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping">Author</span>
                        <input type="text" class="form-control" placeholder="author" name="author" aria-label="author"
                            value="{{ old('author', $blog->author) }}" aria-describedby="addon-wrapping">
                    </div>

                    @if ($blog->content)
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping">Content</span>
                            <textarea class="form-control" aria-label="With textarea" name="content">{{ $blog->content }}</textarea>
                        </div>
                    @else
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping">Content</span>
                            <textarea class="form-control" aria-label="With textarea" name="content"></textarea>
                        </div>
                    @endif

                    <button class="btn btn-success">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection
