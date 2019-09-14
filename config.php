<?php

return [
    'baseUrl' => '',
    'production' => false,
    'siteName' => 'Pengw.in',
    'siteDescription' => 'The personal site of Articus Pengwin',
    'siteAuthor' => 'Articus Pengwin',
    'onlineAccounts' => [
        [
            'url' => 'https://keybase.io/thepengwin',
            'id' => 'keybase',
            'name' => 'Keybase'
        ],
        [
            'url' => 'https://twitter.com/thepengwin',
            'id' => 'twitter',
            'name' => 'Twitter'
        ],
        [
            'url' => 'https://github.com/thepengwin',
            'id' => 'github',
            'name' => 'Github'
        ],
        [
            'url' => 'https://steamcommunity.com/id/thepengwin/',
            'id' => 'steam',
            'name' => 'Steam'
        ],
        [
            'url' => 'https://reddit.com/user/thepengwin',
            'id' => 'reddit',
            'name' => 'Reddit'
        ],
        [
            'url' => 'https://news.ycombinator.com/user?id=Pengwin',
            'id' => 'hacker-news',
            'name' => 'Hacker News'
        ],
        [
            'url' => 'https://t.me/ThePengwin',
            'id' => 'telegram',
            'name' => 'Telegram'
        ],
    ],
    // collections
    'collections' => [
        'posts' => [
            'author' => 'Articus Pengwin', // Default author, if not provided in a post
            'sort' => '-date',
            'path' => 'blog/{filename}',
        ],
        'categories' => [
            'path' => '/blog/categories/{filename}',
            'posts' => function ($page, $allPosts) {
                return $allPosts->filter(function ($post) use ($page) {
                    return $post->categories ? in_array($page->getFilename(), $post->categories, true) : false;
                });
            },
        ],
    ],

    // helpers
    'getDate' => function ($page) {
        return Datetime::createFromFormat('U', $page->date);
    },
    'getExcerpt' => function ($page, $length = 255) {
        $content = $page->excerpt ?? $page->getContent();
        $cleaned = strip_tags(
            preg_replace(['/<pre>[\w\W]*?<\/pre>/', '/<h\d>[\w\W]*?<\/h\d>/'], '', $content),
            '<code>'
        );

        $truncated = substr($cleaned, 0, $length);

        if (substr_count($truncated, '<code>') > substr_count($truncated, '</code>')) {
            $truncated .= '</code>';
        }

        return strlen($cleaned) > $length
            ? preg_replace('/\s+?(\S+)?$/', '', $truncated) . '...'
            : $cleaned;
    },
    'isActive' => function ($page, $path) {
        return ends_with(trimPath($page->getPath()), trimPath($path));
    },
    'getSomeBlogCategories' => function () {
        #TODO: Fill this with categories automagically
        return 'Stuff and Junk';
    },
    'getSelector' => function($page) {
        $slug = rtrim(str_replace('/','_',$page->getPath()),"_ \t\n\r\0\x0B");
        if (empty($slug)) {
            $slug = 'index';
        }
        return 'page_'.$slug;
    },
];
