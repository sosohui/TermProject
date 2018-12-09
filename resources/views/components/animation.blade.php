<body>
    <div class="container">
        사진을 누르면 캐릭터 소개를 볼 수 있습니다.
        <form action='{{ url("/vote/$current_ani") }}' method="post">
            @csrf
            <div class="row">
                @foreach($character as $row)
                    <div class="card" style="width: 18rem;margin:10px;">
                    <a href="{{ url("/animation/$row->ani/$row->name") }}"><img class="card-img-top" src='{{ asset("Image/$row->name.jpg") }}'></a>
                        <div class="card-body">
                            @if(count($checked) > 0  && $checked[0]->vote==$row['name'])
                                <label for="{{ $row['name'] }}" id="label_{{ $row['name'] }}" class="fas fa-heart"><span style="color:black">{{ $row['name'] }}</span></label>
                                <input onclick="handleClick(this)" id="{{ $row['name'] }}" type="radio" name="selectedName" value="{{ $row['name'] }}" checked>
                            @else
                                <label for="{{ $row['name'] }}" id="label_{{ $row['name'] }}" class="far fa-heart"><span style="color:black">{{$row['name'] }}</span></label>
                                <input onclick="handleClick(this)" id="{{ $row['name'] }}" type="radio" name="selectedName" value="{{ $row['name'] }}">
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href='{{ url("/") }}' class="btn btn-primary">Back</a>
        </form>
    </div>
    <script>
        function handleClick(myRadio){
            <?php foreach($character as $row) : ?>
                var radio = document.getElementById('<?=$row['name']?>');
                var label = document.getElementById('label_<?=$row['name']?>');
                if(radio.checked){
                    label.className = "fas fa-heart";
                }else{
                    label.className = "far fa-heart";
                }
            <?php endforeach ?>
        }
    </script>
</body>