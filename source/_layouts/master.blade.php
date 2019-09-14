<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @stack('meta')
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
    <link rel="stylesheet" href="{{ mix('css/iconfont.css', 'assets/build') }}">
    <title>{{ $page->siteName }}{{ $page->title ? ' | ' . $page->title : '' }}</title>
</head>

<body id="{{ $page->getSelector() }}">
    @if (!isset($header) || $header != 'off')
    @include('_fragments.header')
    @endif
    @yield('body')
    @if (!isset($footer) || $footer != 'off')
    @include('_fragments.footer')
    @endif()
    <script src="{{ mix('js/main.js', 'assets/build') }}"></script>
    @stack('scripts')
</body>

</html>