<body>
    <div class="container">
        <br>
        <form action="{{ URL('/search') }}" method="post">
            @csrf
            <div>
              <label for="search_character">chracter_name : </label>
              <input name="search_character" placeholder="영어로 입력해주세요.">
              <button type="submit">Search</button>
            </div>
        </form>
        <br>
        @foreach($ani_characters as $row)
            <a href="{{ url("/animation/$current_ani/$row->name") }}" style="">{{ $row->name }}</a>&nbsp;&nbsp;&nbsp;
        @endforeach
        <br><br>
        <div class="row">
            <img class="align-self-center mr-3" src='{{asset("Image/$character_info->name.jpg")}}' width="300px" height="300px">
            <div class="media-body">
                <h5 class="mt-0">name : {{ $character_info->name }}</h5>
                animation : {{ $character_info->animation }}<br>
                content : {{ $character_info->content }}
            </div>
        </div>
        <br>
        <iframe width="720px" height="450px"src="{{ $character_info->video }}"></iframe>
        <br>
    </div>
</body>