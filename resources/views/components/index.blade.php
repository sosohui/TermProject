<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Ranking
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
        <?php foreach($aniTitle as $row) : ?>
        <a href="{{ url("/$row->ani") }}">
          <button class="dropdown-item" type="button"><?=$row['ani']?></button>
        </a>
        <?php endforeach ?>
      </div>
      <div class="row">
        <?php $i = 1 ?>
        <?php foreach($voted_character as $row) : ?>
          <div class="card" style="width: 18rem;margin:10px;">
            <img class="card-img-top" src='{{ asset("Image/$row->vote.jpg")}} '>
              <div class="card-body">
                {{ $i }}등 : {{ $row->vote }}
                (득표수 : {{ $row->total }})
                  <?php $i = $i+1 ?>
              </div>
          </div>
        <?php endforeach ?>
      </div>
      <div class="row">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <iframe width="960px" height="600px"src="https://www.youtube.com/embed/4TbGLHo18hs?list=RD4TbGLHo18hs"></iframe>
        </div>
    </div>
    </div>
</main>