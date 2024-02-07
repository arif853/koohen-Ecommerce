<div class="detail-qty border radius">
    <a href="#" class="qty-down" wire:click.prevent="decreaseQuantities"><i class="fi-rs-angle-small-down"></i></a>
    <span class="qty-val" wire:model="quantity">{{$quantity}}</span>
    <a href="#" class="qty-up" wire:click.prevent="increaseQuantites"><i class="fi-rs-angle-small-up"></i></a>
 </div>
