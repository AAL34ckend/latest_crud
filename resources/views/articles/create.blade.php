@extends('app')

@section('content')
    <div class="row mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Form Create Article</h4>
                    <a href="{{ route('articles.index') }}" class="btn btn-primary">
                        < Back </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="author" class="form-label">author</label>
                            <input type="text" name="author" placeholder="Enter Name"
                                class="form-control @error('author') is-invalid @enderror">
                            @error('author')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" placeholder="Enter Name"
                                class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" onchange="loadFile(event)" name="image"
                                class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="category"
                                class="form-label @error('category') is-invalid @enderror">Category</label>
                            <select name="category" id="category" class="form-select">
                                <option selected>Choose Category</option>
                                <option value="destination">Destination</option>
                                <option value="travel">Travel</option>
                                <option value="Tour">Tour</option>
                                <option value="Package">Travel Package</option>
                            </select>
                            @error('category')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                            @error('category')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-success">Submit > </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
