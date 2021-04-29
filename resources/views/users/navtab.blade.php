<ul class="nav nav-tabs nav-justified mb-2">
    {{-- トップページ --}}
    <li class="nav-item">
        <a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active' : '' }}">
            TOP
            <span class="badge badge-secondary">{{ $user->microposts_count }}</span>
        </a>
    </li>
    {{-- 人気投稿一覧 --}}
    <li class="nav-item">
        <a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active' : '' }}">
            人気
            <span class="badge badge-secondary">{{ $user->followings_count }}</span>
        </a>
    </li>
    {{-- ユーザーの投稿一覧 --}}
    <li class="nav-item">
        <a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followers') ? 'active' : '' }}">
            ユーザー
            <span class="badge badge-secondary">{{ $user->followers_count }}</span>
        </a>
    </li>
    {{-- お気に入り一覧　--}}
    <li class="nav-item">
        <a href="{{ route('users.favorites' , ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.favorites') ? 'active' : '' }}">
            お気に入り
            <span class="badge badge-secondary">{{ $user->favorites_count }}</span>
        </a>
    </li>
    {{-- 投稿 --}}
    <li class="nav-item">
        <a href="{{ route('users.favorites' , ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.favorites') ? 'active' : '' }}">
            投稿
            <span class="badge badge-secondary">{{ $user->favorites_count }}</span>
        </a>
    </li>