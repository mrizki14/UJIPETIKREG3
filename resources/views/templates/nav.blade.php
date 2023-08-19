<div class="main-wrapper">
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm expand-header d-flex" style="justify-content: space-between;">
            <div class="header-left d-flex">
                <div class="logo">
                    <img src="{{asset('assets/images/logo@2x.png')}}" width="120px" alt="logotelkom">
                </div>
                <a href="#" class="sidebarCollapse" id="toogleSidebar" data-placement="bottom">
                    <span class="fa-solid fa-bars"></span>
                </a>
            </div>
          
            <ul class="navbar-item flex-row ml-auto">
                @if (Auth()->user()->role_id != 1 )
                <li class="nav-item dropdown user-profile-dropdown">
                    <a href="" class="nav-link user" id="" data-bs-toggle="dropdown">
                        <i class="uil uil-bell icon"></i>
                        <p class="count purple-gradient">{{ auth()->user()->unreadNotifications->count() }}</p>
                    </a>

                    <div class="dropdown-menu">
                        <div class="dp-main-menu">
                            {{-- NOTIFIKASI ROLE VALIDATOR --}}
                            {{-- @if (Auth()->user()->role_id === 2 ) --}}
                            @foreach (auth()->user()->unreadNotifications as $notification)
                            <a href="{{ $notification->data['url'].'?'.$notification->id.'&mark_as_read=true&notification_id='.$notification->id  }}" class="dropdown-item message-item">
                                <i class="uil uil-envelope-add user-note"></i>
                                <div class="note-info-desmis">
                                    <div class="user-notify-info">
                                        <p class="note-name">{{ ucwords($notification->data['message']) }}</p>
                                        <p class="note-time">{{ $notification->created_at->diffForHumans() }}</p>
                                    </div>
                                    <p href="" class="status-link">
                                        <span class="fas fa-times"></span>
                                    </p>
                                </div>
                            </a>
                            @endforeach
                            {{-- @foreach (auth()->user()->unreadNotifications as $notification)
                            <a href="{{ $notification->data['url'].'?'.$notification->id.'&mark_as_read=true&notification_id='.$notification->id  }}" class="dropdown-item message-item">
                                <i class="uil uil-envelope-redo user-note"></i>
                                <div class="note-info-desmis">
                                    <div class="user-notify-info">
                                        <p class="note-name">{{ ucwords($notification->data['message']) }}</p>
                                        <p class="note-time">{{ $notification->created_at->diffForHumans() }}</p>
                                    </div>
                                    <p href="" class="status-link">
                                        <span class="fas fa-times"></span>
                                    </p>
                                </div>
                            </a>
                            @endforeach --}}
                            {{-- @endif --}}

                            {{-- NOTIFIKASI ROLE PETUGAS --}}
                            {{-- @if (Auth()->user()->role_id === 3 )
                            @php
                            $shownNotifications = [];
                            @endphp
                                @foreach (auth()->user()->unreadNotifications as $notification)
                                
                                    @if (isset($notification->data['url']) && isset($notification->data['message']) && !in_array($notification->id, $shownNotifications))
                                    @php
                                    $shownNotifications[] = $notification->id;
                                    @endphp
                                    <a href="{{ $notification->data['url'].'?'.$notification->id.'&mark_as_read=true&notification_id='.$notification->id }}" class="dropdown-item message-item">
                                        <i class="uil uil-envelope-add user-note"></i>
                                        <div class="note-info-desmis">
                                            <div class="user-notify-info">
                                                <p class="note-name">{{ ucwords($notification->data['message']) }}</p>
                                                <p class="note-time">{{ $notification->created_at->diffForHumans() }}</p>
                                            </div>
                                            <p href="" class="status-link">
                                                <span class="fas fa-times"></span>
                                            </p>
                                        </div>
                                    </a>
                                    @endif
                                @endforeach

                                @foreach (auth()->user()->unreadNotifications as $notification)
                                    @if (isset($notification->data['url']) && isset($notification->data['message']) && !in_array($notification->id, $shownNotifications))
                                    @php
                                    $shownNotifications[] = $notification->id;
                                    
                                    @endphp
                                    <a href="{{ $notification->data['url'].'?'.$notification->id.'&mark_as_read=true&notification_id='.$notification->id }}" class="dropdown-item message-item">
                                        <i class="uil uil-envelope-add user-note"></i>
                                        <div class="note-info-desmis">
                                            <div class="user-notify-info">
                                                <p class="note-name">{{ ucwords($notification->data['message']) }}</p>
                                                <p class="note-time">{{ $notification->created_at->diffForHumans() }}</p>
                                            </div>
                                            <p href="" class="status-link">
                                                <span class="fas fa-times"></span>
                                            </p>
                                        </div>
                                    </a>
                                    @endif
                                    
                                @endforeach
                            
                            @endif --}}
                        </div>
                    </div>
                </li>
                @endif
                <li class="nav-item dropdown user-profile-dropdown">
                    <a href="" class="nav-link user" id="" data-bs-toggle="dropdown">
                        <i class="uil uil-message icon"></i>
                        <p class="count bg-clc">1</p>
                    </a>

                    <div class="dropdown-menu">
                        <div class="dp-main-menu">
                            <a href="" class="dropdown-item message-item">
                                <i class="uil uil-comment-add user-note"></i>
                                    <div class="user-message-info">
                                        <p class="note-name">Hello, {{Auth()->user()->name}}</p>
                                        <p class="note-time">Telkom Indonesia</p>
                                    </div>
                            </a>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown user-profile-dropdown">
                    <a href="" class="nav-link user" id="" data-bs-toggle="dropdown">
                        <i class="uil uil-user-circle icon"></i>
                    </a>

                    <div class="dropdown-menu">
                        <div class="user-profile-section">
                            <div class="media mx-auto">
                                <i class="uil uil-user-circle icon img-fluid mr-2"></i>
                                <div class="media-body">
                                    <h5>{{Auth()->user()->name}}</h5>
                                    <p>{{Auth()->user()->role->name}}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="dp-main-menu">
                            <a href="{{route('logout')}}" class="dropdown-item">
                                <span class="fas fa-outdent custom"></span>
                                Logout
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
            
        </header>
    </div>

</div>
