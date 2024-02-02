<ul class="list-filter size-filter font-small">

    @foreach ($sizes as $size)
    <li class="{{ $size->id == session()->get('product_size')  ? 'active' : '' }}">
        <a  href="#"  wire:click.prevent="selectSize({{ $size->id }})" class="{{ $size->size_name == session()->get('product_size')  ? 'active' : '' }}" >{{$size->size}}</a></li>
    {{-- wire:click.prevent="selectSize({{ $size->id }})" wire:key="{{ $size->id }}" --}}
    @endforeach
      <li><a class="btn size-button ml-15" href="#">Size Chart</a></li>
   </ul>
