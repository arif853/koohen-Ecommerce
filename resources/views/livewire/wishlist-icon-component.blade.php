<div class="header-action-icon-2">
    <a href="{{route('wishlist')}}">
        <i class="fal fa-heart"></i>
        @if(Cart::instance('wishlist')->count() > 0)
        <span class="pro-count blue">{{Cart::instance('wishlist')->count()}}</span>
        @endif
    </a>
</div>
