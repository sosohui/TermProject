<div class="container">
    <h2>글 수정 폼</h2>
    <p>아래의 모든 필드를 채워주세요.</p>
    <form action="{{ route('board.update',['id'=>$row->id]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT"/>
        <input type="hidden" name="num" value="<?=$row["id"] ?>">
        <div class="form-group">
            <label for="title">제목:</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $row["title"] ?>" >
        </div>
        <input type="hidden" class="form-control" id="writer" name="writer" value="<?= $row["writer"] ?>">
        <div class="form-group">
            <label for="content">내용:</label>
            <textarea class="form-control" rows="5" id="content" name="content"><?= $row["content"] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">수정</button>
        <a class="btn btn-danger" href="{{ URL::previous() }}">목록보기</a>
    </form>
</div>
      