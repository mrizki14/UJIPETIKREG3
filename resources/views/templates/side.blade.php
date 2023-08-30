<div class="left-menu">
    <div class="menubar-content">
        <nav class="animated bounceInDown d-flex flex-column justify-content-between" style="height: 90vh;">
            <ul id="sidebar">
                <div class="profile">
                    <!-- <i class="uil uil-user"></i> -->
                    <h5>{{Auth()->user()->name}}</h5>
                    <p class="text-capitalize">{{Auth()->user()->role->name}}</p>
                </div>
                <li class="active sub-menu">
                    <a href="#">
                        <i class="uil uil-create-dashboard"></i>
                        Dashboard
                        <div class="fa fa-caret-down right"></div>
                    </a>
                    <ul class="left-menu-dp">
                        <li>
                            <a href="{{url('/')}}">
                                <i class="fas fa-calender-alt"></i>
                                Table
                            </a>
                            @if (Auth()->user()->role_id === 1)
                            <a href="{{url('/pelanggan')}}">
                                <i class="fas fa-calender-alt"></i>
                                Data Pelanggan
                            </a>
                            @endif
                        </li>
                    </ul>
                </li>

                @if (Auth()->user()->role_id != 1)
                <li class="sub-menu">
                    <a href="#">
                        <i class="uil uil-inbox"></i>
                        Validasi
                        <div class="fa fa-caret-down right"></div>
                    </a>
                    <ul class="left-menu-dp">
                        <li>
                            @if (Auth()->user()->role_id === 2)
                            <a href="{{url('validator')}}">
                                <i class="uil uil-folder-open"></i>
                                Validator
                            </a>
                            @endif
                            @if(Auth()->user()->role_id === 3) 
                                <a href="{{url('petugas')}}">
                                    <i class="uil uil-folder-open"></i>
                                    Petugas
                                </a>
                            @endif
                        </li>
                    </ul>
                </li>
                @endif
                @if (Auth()->user()->role_id === 1)
                <li class="">
                    <a href="{{url('users')}}">
                        <i class="uil uil-user-plus"></i>
                        User Account
                    </a>
                </li>
                @endif
            </ul>

            <ul id="sidebar">
                <li class="logout sub-menu">
                    <a href="{{route('logout')}}">
                        <i class="uil uil-user-plus"></i>
                        Logout
                    </a>
                </li>
            </ul>
            
        </nav>
    </div>
</div>