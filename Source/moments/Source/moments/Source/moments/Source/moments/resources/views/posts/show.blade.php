@extends('layouts.app')

<!-- User Feed -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="w-100">
        </div>
        <div class="col-4">

            <div class="d-flex align-items-center">
                <div class="pr-3">
                    <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100" style="max-width: 50px">
                </div>
                <div>
                    <div class="font-weight-bold">
                        <span class="text-dark">
                            <a href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a>
                        </span>
                        @can('update', $post->user->profile)
                            <a href="/posts/{{ $post->id }}/edit" class="pl-3">Edit Post</a>
                        @endcan
                    </div>
                </div>
            </div>

            <p class="pt-3">
                {{ $post->name  }}
            </p>

            <hr>

            <h3>Comments</h3>

                <form method="post" action="{{ route('comments.store') }}">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="body"></textarea>
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        <input type="hidden" name="user_id" value="{{ $post->user->id }}" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Write Comment" />
                    </div>
                </form>

{{--                @error('body')--}}
{{--                <strong>{{ $message }}</strong>--}}
{{--                @enderror--}}

            <span><h4>{{$post->comments->count()}} {{ Str::plural('comment', $post->comments->count()) }}</h4></span>

                @forelse ($post->comments as $comment)
                    <p>{{ $comment->user->name }} {{$comment->created_at}}</p>
                    <p>{{ $comment->body }}</p>
                    <hr>
                @empty
                    <p>This post has no comments</p>
                @endforelse

        </div>
    </div>
</div>
@endsection
