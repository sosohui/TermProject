<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <?php foreach($aniTitle as $row) : ?>
            <li class="nav-item">
                <a class="nav-link active" href="{{url("/animation/$row->ani")}}">
                    <i class="far fa-smile"></i>
                    <?= $row['ani'] ?><span class="sr-only"></span>
                </a>
            </li>
            <?php endforeach ?>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/board')}}">
                <i class="fas fa-pencil-alt"></i>
                    자유 게시판
                </a>
            </li>
            <!-- <li class="nav-item">
            <a class="nav-link" href="#">
                <span data-feather="shopping-cart"></span>
                Products
            </a>
            </li> -->
        </ul>
    </div>
</nav>