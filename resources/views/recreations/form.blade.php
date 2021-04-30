@section('content')
    <div class="text-center">
        <h1>投稿</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'recreations.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'レクリエーション名') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('type', 'レクリエーションの種類') !!}
                    {!! Form::select('type', ['手作業','体操','脳トレ','その他'], ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('number', '人数') !!}
                    {!! Form::select('min_number',1,2,3,4,5,6,7,8,9,10, ['class' => 'form-control'],'display:inline') !!}
                     ~
                    {!! Form::select('max_number',1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード確認') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('登録', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection