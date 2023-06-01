@extends('app')

@section('content')
    <div class="row my-4">
        <div class="col-7">
            <div class="d-flex justify-content-between align-items-center mt-3">
                <h2>Article Page</h2>
                <a href="{{ route('articles.index') }}" class="btn btn-primary">
                    < Back</a>
            </div>
            <div>
                <img src="{{ asset('storage/' . $article->image) }}" alt="gambar article" class="img-fluid mt-5">
                <h3 class="mt-3">{{ $article->title }}</h3>
                <p class="mt-3">
                    {{ $article->description }}
                </p>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <a href="#" class="badge bg-danger text-decoration-none">{{ $article->category }}</a>
                <div>
                    <em>Author : </>
                        <em>{{ $article->author }} / </>
                            <span>{{ $article->created_at->format('d M Y') }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
