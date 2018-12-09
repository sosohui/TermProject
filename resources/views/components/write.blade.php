<div class="container">
    <h2>새 글쓰기 폼</h2>
    <p>아래의 모든 필드를 채워주세요</p>
    <form action="{{ url('/board') }}" method="post">
        @csrf
        <div class="form-group">
            <div class="form-group">
                <label for="title">제목:</label>
                    <input type="text" class="form-control" id="title" name="title" value={{old('title')}}>
                    @if($errors->has('title'))
                        <span class="help-block">{{ $errors->get('title')[0] }}</span>
                    @endif
                    </div>
                    <div class="form-group">
                    <input type="hidden" class="form-control" id="writer" name="writer" value={{Auth::user()['name']}}>
                    @if($errors->has('writer'))
                        <span class="help-block">{{ $errors->get('writer')[0] }}</span>
                    @endif
                    </div>    
                    <div class="form-group">
                    <label for="content">내용:</label>
                    <textarea class="form-control" name="content" id="summary-ckeditor">{{old('content')}}</textarea>
                    @if($errors->has('content'))
                        <span class="help-block">{{$errors->get('content')[0]}}</span>
                    @endif
                    </div>
                    <button type="submit" class="btn btn-primary">글등록</button>
                    <a class="btn btn-danger" href="{{ URL::previous() }}">목록보기</a>
                </form>
            </div>
        </div>
    </form>
</div>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>