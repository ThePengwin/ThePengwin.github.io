@extends('_layouts.master')

@push('meta')

    <meta property="og:title" content="{{ $page->title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ $page->getUrl() }}" />
    <meta property="og:description" content="{{ $page->description }}" />

@endpush

@section('body')

<div class="content-page container">
    <h1>{{ $page->title }}</h1>
    <h2>{{ date('F j, Y',$page->date) }}</h2>
    @yield('content')

    <div class="row">
        <div class="col-sm-6">
            <div class="button-group">
                @if ($next = $page->getNext())
                <a role="button" class="tooltip" href="{{ $next->getUrl() }}" aria-label="Older Post: {{ $next->title }}">
                    &LeftArrow; {{ $next->title }}
                </a>
                @endif
            </div>
        </div>

        <div class="col-sm-6">
            <div class="button-group">
                @if ($previous = $page->getPrevious())
                <a role="button" class="tooltip" href="{{ $previous->getUrl() }}" aria-label="Newer Post: {{ $previous->title }}">
                    {{ $previous->title }} &RightArrow;
                </a>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection