@extends('layouts.app')
<!-- User Feed -->
@section('content')
<div class="container">
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')

        <div class="row">
            <h3>Edit Profile</h3>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label">Title</label>

            <input id="title"
                   type="text"
                   name="title"
                   class="form-control @error('title')
                       is-invalid @enderror" name="title"
                   value="{{ old('title') ?? $user->profile->title }}"
                   autocomplete="title" autofocus>

            @error('title')
            <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label">Description</label>

                <input id="description"
                       type="text"
                       name="description"
                       class="form-control @error('description')
                           is-invalid @enderror" name="description"
                       value="{{ old('description') ?? $user->profile->description }}"
                       autocomplete="description" autofocus>

                @error('description')
                <strong>{{ $message }}</strong>
                @enderror

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
            <button class="btn btn-primary">Save</button>
        </div>




    </form>
</div>
@endsection
