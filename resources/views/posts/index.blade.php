@extends('layouts.app')
<!-- User Feed -->
@section('content')
<div class="container">
    <div class="row d-flex align-items-center pb-4">

        @if(!isset($search_query))
{{--            <filter-component></filter-component>--}}
        <div class="row d-flex">
            <form action="{{ route('posts.index') }}">
                <div class="row">
                    <input type="hidden" name="sortBy" value="date">
                    <button type="submit" class="w-100 btn btn-outline-dark">Date</button>
                </div>
            </form>
            <form action="{{ route('posts.index') }}" class="ml-5">
                <div class="row">
                    <input type="hidden" name="sortBy" value="name">
                    <button type="submit" class="w-100 btn btn btn-outline-dark">Name</button>
                </div>
            </form>
        </div>
        @endif

{{--        <div id="searchForm" class="d-flex  ml-5">--}}
{{--            <form action="{{ route('posts.index') }}">--}}
{{--                <div class="row d-flex">--}}
{{--                    <div class="col-md-4">--}}
{{--                        <input class="form-control form-control-sm" type="search" name="searchQuery" value="{{ $searchQuery ?? '' }}">--}}
{{--                    </div>--}}
{{--                    <div class="col-md-2 col-3">--}}
{{--                        <button type="submit" class=" btn btn-primary">Search</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}

    </div>

    <div class="row pt-3">
    @foreach($posts as $post)
            <div class="col-4 pb-4" >
            <div class="col-8">
                <a href="/posts/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
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
                        </div>
                    </div>
                </div>
                <p class="pt-3">{{ $post->name  }}</p>
                <hr>
            </div>
        </div>
    @endforeach
    </div>

</div>
@endsection
