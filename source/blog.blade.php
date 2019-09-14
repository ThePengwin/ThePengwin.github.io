---
pagination:
    collection: posts
    perPage: 6
---
@extends('_layouts.master')

@push('meta')

<meta property="og:title" content="{{ $page->siteName }} Blog" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ $page->getUrl() }}" />
<meta property="og:description" content="The list of blog posts for {{ $page->siteName }}" />

@endpush

@section('body')

<div class="content-page container">
    <h1>Blog</h1>
    <div class="container">
        <div class="row">
        @foreach ($pagination->items as $post)
            <div class="col-sm-12 col-md-6">
            <div class="card fluid">
                <a href="{{ $post->getUrl() }}">
                    <h2>{{ $post->title }}</h2>
                </a>
                <p><em>{{ date('j F, Y', $post->date)}}</em></p>
                <p>{{ $post->getExcerpt() }}</p>
            </div>
            </div>
        @if ($post == $pagination->items->last())
        </div>
    </div>
    @endif
    @endforeach
    @if ($pagination->items->count() > 1)
    <div class="row">
        <div class="col-sm-6 col-md-first col-md-2">
            <div class="button-group">
                @if ($previous = $pagination->previous)
                <a href="{{ $previous }}" title="Previous Page" class="button">&LeftArrow;</a>
                @endif
            </div>
        </div>
        <div class="col-sm-last col-sm-12 col-md-8">
            <div class="button-group">
                @foreach ($pagination->pages as $pageNumber => $path)
                <a href="{{ $path }}" title="Go to Page {{ $pageNumber }}"
                    class="button {{ $pagination->currentPage == $pageNumber ? 'inverse' : '' }}">{{ $pageNumber }}</a>
                @endforeach
            </div>
        </div>
        <div class="col-sm-6 col-md-last col-md-2">
            <div class="button-group">
                @if ($next = $pagination->next)
                <a href="{{ $next }}" title="Next Page" class="button">&RightArrow;</a>
                @endif
            </div>
        </div>
    </div>
    @endif
</div>

@endsection