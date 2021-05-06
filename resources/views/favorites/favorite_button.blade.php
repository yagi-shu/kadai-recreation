@if (\Auth::check())    
    @if (Auth::user()->is_favorite($recreation->id))
        {{-- アンお気に入りボタンのフォーム --}}
        {!! Form::open(['route' => ['favorites.unfavorite', $recreation->id], 'method' => 'delete']) !!}
            {!! Form::submit('解除', ['class' => "btn btn-secondary btn-sm"]) !!}
        {!! Form::close() !!}
    @else
        {{-- お気に入りボタンのフォーム --}}
        {!! Form::open(['route' => ['favorites.favorite', $recreation->id]]) !!}
            {!! Form::submit('お気に入り', ['class' => "btn btn-success btn-sm"]) !!}
        {!! Form::close() !!}
    @endif
@endif
