<div>

    <div class="price-filter">
        <div class="price-filter-inner">
            <div id="slider-range" wire:ignore></div>
            <div class="price_slider_amount">
                <div class="label-input">
                    <span>Range:</span> <input type="text" id="amount" name="price" placeholder="Add Your Price"
                        wire:model="priceRange">
                </div>
            </div>
        </div>
    </div>

    @push('shopa')
        <script>
            document.addEventListener('livewire:load', function () {
                Livewire.on('priceRangeUpdated', function (priceRange) {
                    $('#slider-range').slider('values', priceRange);
                });
            });

            $(document).ready(function () {
                $('#slider-range').slider({
                    range: true,
                    min: 0,
                    max: 1000000,
                    values: @json($priceRange),
                    slide: function (event, ui) {
                        @this.set('priceRange', ui.values);
                    }
                });

                $('#amount').on('input', function () {
                    var values = $(this).val().split(' - ');
                    @this.set('priceRange', [parseInt(values[0]), parseInt(values[1])]);
                });
            });
        </script>
    @endpush
</div>

