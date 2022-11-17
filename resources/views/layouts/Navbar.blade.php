<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container">

            <a class="navbar-brand text-white " href="{{route('home.show')}}"><i class="fa fa-solid fa-camera-retro fa-lg mr-2"></i> RE-EVENT </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nvbCollapse" aria-controls="nvbCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nvbCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item pl-1 justify-content-end">
                        <a class="nav-link" href="{{route('home.show')}}"><i class="fa fa-home fa-fw mr-1"></i> Home </a>
                    </li>
                    <li class="nav-item pl-1">
                        <a class="nav-link" href="{{route('faq.index')}}"><i class="fa fa-info-circle fa-fw mr-1"></i> FAQ </a>
                    </li>
                    <li class="nav-item pl-1">
                        <a class="nav-link" href="{{route('aboutUs.index')}}"><i class="fa fa-phone fa-fw fa-rotate-180 mr-1"></i> About Us </a>
                    </li>
                    <li class="nav-item pl-1">
                        <a class="nav-link" href="{{route('login.show')}}"><i class="fa fa-user-plus fa-fw mr-1"></i> Register </a>
                    </li>
                    <!-- Button trigger modal -->
                    <a href="#" class="btn btn-lg btn-success" data-toggle="modal" data-target="#basicModal">
                        <span class="fa fa-f1 mr-1 fa-search" aria-hidden="true"></span>
                    </a>
                    <li class="nav-item float">
                        <a class="nav-link" href="#"><i class="fa fa-sign-in-alt fa-fw mr-1"></i> Logout </a>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal -->

    <!-- Full screen modal -->
    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" data-backdrop="false" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class='container'>
                    <input type="text" id="searchInput" placeholder="Search..">

                    <div class="modal-header">
                        <h4 class="modal-title text-center" id="myModalLabel"> RESULTS DOWN HERE: TODO </h4>
                        <button id="close-modal-button" data-dismiss="modal"></button>
                    </div>
                </div>


            </div>
        </div>
    </div>
</header>