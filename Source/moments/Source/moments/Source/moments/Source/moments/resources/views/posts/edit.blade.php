@extends('layouts.app')
<!-- User Feed -->
@section('content')
    <div class="container">
        <form action="/posts/{{ $post->id }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PATCH')

            <div class="row">
                <h3>Edit Profile</h3>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label">Name</label>

                <input id="name"
                       type="text"
                       name="name"
                       class="form-control @error('name')
                           is-invalid @enderror" name="name"
                       value="{{ old('name') ?? $post->name }}"
                       autocomplete="name" autofocus>

                @error('name')
                <strong>{{ $message }}</strong>
                @enderror
            </div>

            <div class="row pt-4">
                <button class="btn btn-primary">Save</button>
            </div>

        </form>
    </div>
@endsection

