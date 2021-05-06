<h1>投稿一覧</h1>

@if (count($recreations) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>タイトル</th>
                <th>内容</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recreations as $recreation)
            <tr>
                <td>{!! link_to_route('recreations.show', $recreation->name, ['id' => $recreation->id]) !!}</td>
                <td>{{ $recreation->content }}</td>
                <td>@include('favorites.favorite_button')</td>
            </tr>
                
            @endforeach
        </tbody>
    </table>

@endif



{{--<div class="container">
        @foreach ($recreations as $recreation)
            <table class="table">
                <tobody>
                    <tr>
                        <th scope="col">{!! $recreation->user->name !!}</th>
                        <td>{!! nl2br(e($recreation->content)) !!}</td>
                    </tr>
                </tobody>
            </table>
        @endforeach
    </div>--}}