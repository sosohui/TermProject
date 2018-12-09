<div class="container">
    <h2>게시글 상세 정보</h2>
    <table class="table">
        <tr> 
            <th>제목</th>
            <td><?= $msg["title"]?></td>
        </tr>	
        <tr> 
            <th>작성자</th>
            <td><?= $msg["writer"]?></td>
        </tr>	
        <tr> 
            <th>작성일시</th>
            <td><?= $msg["created_at"]?></td>				
        </tr>	
        <tr> 
            <th>조회수</th>
            <td><?= $msg["hits"]?></td>				
        </tr>	
        <tr> 
            <th>내용</th>
            <td><?= $msg["content"]?></td>				
        </tr>				
    </table>
    <div class="row">
        <a href="{{ URL('/board') }}" class="btn btn-primary">목록보기</a>
        <a href="{{ route('board.edit',['id'=>$msg->id]) }}" class="btn btn-success">수정하기</a>

        <form action="{{ route('board.destroy',['id'=>$msg->id]) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="DELETE"/>
            {{-- <input type="hidden" name="page" value="{{$page}}">	 --}}
            <button type="submit" class="btn btn-danger">삭제</button>	
        </form>					
    </div>	
</div>	