@extends('app')

@section('content')
    <div class="mt-5">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h1>Table Article</h1>
            <a href="{{ route('articles.create') }}" class="btn btn-primary">+ Create Article</a>
        </div>
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> {{ session('message') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session('update'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> {{ session('update') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session('delete'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> {{ session('delete') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}.</td>
                        <td>
                            <img src="{{ asset('storage/' . $value->image) }}" alt="City" class="img-fluid"
                                width="250px">
                        </td>
                        <td>{{ $value->title }}</td>
                        <td>{{ $value->description }}</td>
                        <td>{{ $value->category }}</td>
                        <td>
                            <a href="{{ route('articles.show', $value->id) }}" class="text-success">
                                <i class="fa-solid fa-eye fa-xl"></i> {{-- eye --}}
                            </a>
                            <a href="{{ route('articles.edit', $value->id) }}" class="text-warning mx-3">
                                <i class="fa-solid fa-pen fa-xl"></i> {{-- pen --}}
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Article</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure for delete this?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">cancel</button>
                                            <form action="{{ route('articles.destroy', $value->id) }}" method="POST"
                                                id="GFG" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <a href="#" class="btn btn-danger text-light"
                                                    onclick="myFunction()">Delete</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--  trigger  --}}
                            <button type="button" class="btn btn-link text-danger" data-bs-target="#modalDelete"
                                data-bs-toggle="modal">
                                <i class="fa-sharp fa-solid fa-xmark fa-xl"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@push('javascript')
    <script>
        function myFunction() {
            document.getElementById("GFG").submit();
        }
    </script>
@endpush
