<ul class="nav nav-tabs nav-justified mb-2">
    {{-- トップページ --}}
    <li class="nav-item">
        <a href="/" class="nav-link {{ Request::routeIs('/') ? 'active' : '' }}">
            TOP
        </a>
    </li>
    
    {{-- 人気投稿一覧 --}}
 
   <li class="nav-item">
        <a href="#" class="nav-link">
         人気
        </a>
    </li>
    
    {{-- ユーザーの投稿一覧 --}}
    <li class="nav-item">
        @if (\Auth::check())
            
            <a href="{{ route('users.show', ['user' => \Auth::id()]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active' : '' }}">
             ユーザー
            </a>
        @else 
            <a href="{{ route('login') }}" class="nav-link {{ Request::routeIs('login') ? 'active' : '' }}">
             ユーザー
            </a>
        @endif
            
    </li>
    
    
    {{-- お気に入り一覧　--}}
    
    <li class="nav-item">
        <a href="#" class="nav-link">
         お気に入り
        </a>
    </li>
    
    {{-- 投稿 --}}
    <li class="nav-item">
        @if (\Auth::check())    
            <a href="{{ route('recreations.create') }}" class="nav-link {{ Request::routeIs('recreations.') ? 'active' : '' }}">
             投稿
            </a>
        @else 
            <a href="{{ route('login') }}" class="nav-link {{ Request::routeIs('login') ? 'active' : '' }}">
             投稿
            </a>
        @endif
    </li>
</ul>
