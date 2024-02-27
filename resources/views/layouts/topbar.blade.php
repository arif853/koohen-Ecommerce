<header class="main-header navbar">
    <div class="col-search">
        <form class="searchform">
            <div class="input-group">
                <input list="search_terms" type="text" class="form-control" placeholder="Search term">
                <button class="btn btn-light bg" type="button"> <i class="material-icons md-search"></i></button>
            </div>
            <datalist id="search_terms">
                <option value="Products">
                <option value="New orders">
                <option value="Apple iphone">
                <option value="Ahmed Hassan">
            </datalist>
        </form>
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
            <li class="nav-item">
                <a class="nav-link btn-icon" href="#">
                    <i class="material-icons md-notifications animation-shake"></i>
                    <span class="badge rounded-pill">3</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link btn-icon pos" href="{{route('pos')}}">
                    POS
                </a>
            </li>


            <li class="dropdown nav-item">
                <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false"> <img class="img-xs rounded-circle" src="{{ asset('/') }}admin/assets/imgs/customer_avatar.png" alt="User"></a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                    <a class="dropdown-item" href="{{route('profile.edit')}}"><i class="material-icons md-perm_identity"></i>Edit Profile</a>
                    <a class="dropdown-item" href="#"><i class="material-icons md-settings"></i>Account Settings</a>
                    <a class="dropdown-item" href="#"><i class="material-icons md-account_balance_wallet"></i>Wallet</a>
                    <a class="dropdown-item" href="#"><i class="material-icons md-receipt"></i>Billing</a>
                    <a class="dropdown-item" href="#"><i class="material-icons md-help_outline"></i>Help center</a>
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
