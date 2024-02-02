
<ul class="list-filter color-filter">

    @foreach ($colors as $color)
    <li class="{{ $color->id == session()->get('product_color')  ? 'active' : '' }}">
        <a href="#" wire:click.prevent="selectColor({{ $color->id }})" data-color="{{$color->color_name}}" >
            <span class="product-color-red" style="background: {{$color->color_code}};"></span>
        </a>
        {{-- wire:click.prevent="selectColor({{ $color->id }})" wire:key="{{ $color->id }}" --}}
    </li>
    @endforeach

</ul>
