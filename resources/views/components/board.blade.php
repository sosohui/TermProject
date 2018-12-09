<div class="container">
    <table class="table">
        <tr>
            <th>NUM</th>
            <th>TITLE</th>
            <th>WRITER</th>
            <th>HITS</th>
            <th>DATE</th>
        </tr>
        @foreach ($msgs as $msg)
            <tr>
                <td>{{$msg->id}}</td>
                <td><a href="{{route('board.show',['id'=>$msg->id])}}">{{$msg->title}}</a></td>
                <td>{{$msg->writer}}</td>
                <td>{{$msg->hits}}</td>
                <td>{{$msg->created_at}}</td>
            </tr>
        @endforeach
    </table>
    {{$msgs->links()}}
    <a class="btn btn-primary" href="{{ url('board/create') }}">Write</a>
    <a class="btn btn-primary" href="{{ URL::previous() }}">Back</a>
</div>