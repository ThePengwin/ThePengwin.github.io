@extends('_layouts.master')

@section('body')

<div class="content-page container">
    <h1>About</h1>
    <p>Hello there. I am Articus Pengwin. I'm one of the few people who probably still use a psuedonym on the internet.
        I've been on the internet back when it was an awful idea to use your real name on the internet (It still is
        really). I am:</p>
    <ul>
        <li>A Web developer, usually specialising in:
            <ul>
                <li>LAMP / LEMP stacks and languages</li>
                <li>Javascript, both frontend and backend.</li>
                <li>MySQL / MariaDB, NoSQL Databases</li>
                <li>BASH and other shell languages</li>
            </ul>
        </li>
        <li>A technology enthusiast
            <ul>
                <li>I love to use Linux and enjoy exploring and using FOSS software.</li>
                <li>I read about gadgets all the time.</li>
                <li>I love opening things up, breaking them, and making them work again.</li>
            </ul>
        </li>
        <li>A gamer, usually playing games on:
            <ul>
                <li>PC</li>
                <li>Nintendo Switch</li>
            </ul>
        </li>
        <li>Living with cancer
            <ul>
                <li>I Was diagnoised with <a href="https://en.wikipedia.org/wiki/Angiosarcoma">angiosarcoma</a> in
                    Mid-2019</li>
            </ul>
        </li>
    </ul>
    <p>With all the things that have happened in my life, I think I might have enough to write about.</p>
    <h2>Elsewhere on the internet</h2>
    <p>Some of my online accounts:</p>
    @include('_fragments.online-accounts', ['labels' => 'on'])
    <p>I'm also on many other places that need an account... Usually as &ldquo;Pengwin&rdquo;, &ldquo;ThePengwin&rdquo;,
        or&ldquo;Articus Pengwin&rdquo;</p>
</div>

@endsection