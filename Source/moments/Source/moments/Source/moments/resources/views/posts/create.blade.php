@extends('layouts.app')
<!-- User Feed -->
@section('content')
<div class="container">
    <form action="/posts/store" enctype="multipart/form-data" method="post">
        @csrf

        <div class="row">
            <h3>Add New Image</h3>
        </div>

        <div class="row pt-4">
            {{--            <label for="image" class="col-md-4 col-form-label">Post Image</label>--}}
            <input type="file", class="form-control-file" id="image" name="image">

            @error('image')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>

        <div class="row pt-4">
            <div class="col-8 offset-">
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Name</label>

                    <input id="name"
                           type="text"
                           name="name"
                           class="form-control @error('name')
                               is-invalid @enderror" name="name"
                           value="{{ old('name') }}"
                           autocomplete="name" autofocus>

                    @error('name')
                    <strong>{{ $message }}</strong>
                    @enderror

                </div>
            </div>
        </div>



        <div class="row pt-4">
            <button class="btn btn-primary">Add New Image</button>
        </div>

    </form>
</div>
@endsection
