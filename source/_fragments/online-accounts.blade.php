<ul class="online-accounts">
    @foreach ($page->onlineAccounts as $account)
        <li>
            <a href="{{ $account['url'] }}" class="tooltip"  aria-label="{{ $account['name'] }}">
            <i class="icon icon-{{ $account['id'] }}"></i>
                @if($labels != 'off')
                {{ $account['name'] }}
                @endif
            </a>
        </li>
    @endforeach
</ul>