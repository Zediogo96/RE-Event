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
                        <a class="nav-link" href="{{route('login')}}"><i class="fa fa-user-plus fa-fw mr-1"></i> Register </a>
                    </li>
                    <!-- Button trigger modal -->
                    <a href="#" class="btn btn-lg nav-link" data-toggle="modal" data-target="#basicModal">
                        <span class="fa mr-1 fa-search" aria-hidden="true"></span> Search
                    </a>
                    <li class="nav-item float">
                        <a class="nav-link" href="{{route('user.show', 1)}}"><i class="fa fa-sign-in-alt fa-fw mr-1"></i> Logout </a>
                    </li>
                    {{Auth::user()->name}}
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal -->

    <!-- Full screen modal -->
    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" data-backdrop="false" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content-box" style="height: 18rem;">

                <div class="form-group">
                    <input type="text" class="form-controller" id="searchInput" name="search"></input>
                </div>
                <table class="table table-bordered table-hover" style="margin-top:1rem;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>City</th>
                        </tr>
                    </thead>
                    <tbody id="table-res">
                    </tbody>
                </table>
                <button id="close-modal-button" data-dismiss="modal"></button>

            </div>
        </div>
    </div>

</header>