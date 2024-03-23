<header class="main-header navbar">
    <div class="col-search">
        
    </div>
    <style>
        .nav-item .pos{
            width: 80px;
            height: 40px;
            line-height: 36px;
            border: 2px solid #b3b3b3;
            border-radius: 28px;
            margin-left: 15px;
            margin-right: 15px;
        }
    </style>
    <div class="col-nav">
        <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"> <i class="material-icons md-apps"></i> </button>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link btn-icon pos" href="{{url('/cache_clear')}}">
                   Cache
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link btn-icon" href="#">
                    <i class="material-icons md-notifications animation-shake"></i>
                    <span class="badge rounded-pill">3</span>
                </a>
            </li> --}}
            @if(auth()->user()->hasRole(['Super Admin','Admin','User']))
            <li class="nav-item">
                <a class="nav-link btn-icon pos" href="{{route('pos')}}">
                    POS
                </a>
            </li>
            @endif

            <li class="dropdown nav-item">
                <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false"> <img class="img-xs rounded-circle" src="{{ asset('/') }}admin/assets/imgs/customer_avatar.png" alt="User"></a>
                <span>{{auth()->user()->name}}</span>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                    <a class="dropdown-item" href="{{route('profile.edit')}}"><i class="material-icons md-perm_identity"></i>Edit Profile</a>
                  
                    <div class="dropdown-divider"></div>
                    {{-- <form method="POST" action="{{ route('logout') }}">
                        @csrf
                    <a class="dropdown-item text-danger" href="{{route('logout')}} " onclick="event.preventDefault();
                    this.closest('form').submit();"><i class="material-icons md-exit_to_app"></i>Logout</a>
                    </form> --}}
                    <a class="dropdown-item text-danger"  onclick="event.preventDefault();document.getElementById('logout-form').submit();"> <i class="material-icons md-exit_to_app"></i>Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             {{ csrf_field() }}
                     </form>
                </div>
            </li>
        </ul>
    </div>
</header>
