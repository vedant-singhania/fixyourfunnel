@extends('layouts.app')
<!-- User Feed -->
@section('content')
<div class="container">

    <div class="row">
        <div class="col-3">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100" />
        </div>
        <div class="col-9">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                @can('update', $user->profile)
                    <a href="/profile/{{ $user->id  }}/edit">Edit Profile</a>
                @endcan
            </div>
            <div class="d-flex">
                <div class="pr-5">{{ $user->posts->count() }} Posts</div>
            </div>
            <div>{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
        </div>
    </div>

    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4" >
                <a href="/posts/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100" />
                </a>
            </div>
        @endforeach

    </div>
</div>
@endsection
