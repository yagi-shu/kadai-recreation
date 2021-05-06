@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
<h1>{{ $recreation->name }}</h1>

    <table class="table table-bordered">
        <tr>
            <th>タイトル</th>
            <td>{{ $recreation->name }}</td>
        </tr>
        <tr>
            <th>情報</th>
            <td>{{ $recreation->type }}</td>
        </tr>
        <tr>
            <th>内容</th>
            <td>{{ $recreation->content }}</td>
        </tr>
    </table>
    
        @if (Auth::id() == $recreation->user_id)
            {!! link_to_route('recreations.edit', '編集', ['recreation' => $recreation->id], ['class' => 'btn btn-light']) !!}
            
            {!! Form::model($recreation, ['route' => ['recreations.destroy', $recreation->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @endif
        
        @include('favorites.favorite_button')

@endsection
