<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-light bg-link">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/">介護　レク探し</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li class="nav-item">{!! link_to_route('logout.get', 'Logout') !!}</li>
                    {{-- ユーザ登録ページへのリンク --}}
                @else
                    <li class="nav-item">{!! Link_to_route('signup.get', '登録', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li></li>
                @endif
            </ul>
        </div>
    </nav>
</header>