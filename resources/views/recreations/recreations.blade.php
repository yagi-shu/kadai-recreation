@if (count($recreations) > 0)
    <div class="container">
        @foreach ($recreations as $recreation)
            <table class="table">
                <tobody>
                    <tr>
                        <th scope="col">{!! $recreation->user->name !!}</th>
                        <td>{!! n12br(e($recreation->content)) !!}</td>
                    </tr>
                </tobody>
            </table>
        @endforeach
    </div>

@endif