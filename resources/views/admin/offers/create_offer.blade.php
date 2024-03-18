{{-- Modal category add --}}

<!-- Modal -->
<div class="modal fade" id="offerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Offer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="category_form" id="category_form"></div>
        <form id="OfferProductForm">
            @csrf
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-12 mb-4">
                      <label for="validationDefault01" class="form-label">Offer Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="validationDefault01" placeholder="Name here..." required name="offer_name">
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="validationDefault01" class="form-label">Offer Percentage <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="offer_percentd" placeholder="Name here..." required name="offer_percent">
                      </div>
                    <div class="col-md-12 mb-4">
                        <label for="validationDefault01" class="form-label">Offer Type <span class="text-danger">*</span></label>
                        <select id="offertype" class="form-control" name="offer_type_id">
                            <option value="">Select offer type</option>
                            @foreach ($offerType as $offer_type)
                                <option value="{{ $offer_type->id }}">{{ $offer_type->offer_type_name }}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" class="form-control" id="validationDefault01" required> --}}
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="validationDefault01" class="form-label">Products<span class="text-danger">*</span></label>
                        <select id="offer_product_ids" class="js-select2" name="offer_product_id[]" multiple="multiple">
                           @foreach ($products as $product)
                           <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                           @endforeach
                        </select>
                        {{-- <input type="text" class="form-control" id="validationDefault01" required> --}}
                    </div>
                    
                    <div class="col-md-12 mb-4">
                        <input type="checkbox"  id="showVariantFields" >
                        <label for="showVariantFields" class="form-label ml-2">Check if offer time limited</label>
                    </div>
                    <div id="variantFields" style="display:none;">
                        <div class="col-6 mb-4">
                            <label for="datetimepicker" class="form-label ml-2">Start date and time</label>
                            <input type="text" class="form-control datetimepicker" id="datetimepicker" name="from_date">
                        </div>
                        <div class="col-6 mb-4">
                            <label for="datetimepicker2" class="form-label ml-2">End date and time</label>
                            <input type="text" class="form-control datetimepicker" id="datetimepicker2" name="to_date">
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Save</button>
                      {{-- <button class="btn btn-primary" type="submit">Submit form</button> --}}
                    </div>
                </div>
            </div>
        </form>
        {{-- <div class="modal-footer">
        </div> --}}
      </div>
    </div>
</div>


{{-- <script>
    document.getElementById('imageInput').addEventListener('change', function (event) {
        const input = event.target;
        const preview = document.getElementById('image-preview');
        const outputImage = document.getElementById('output-image');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                outputImage.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }
    });

</script> --}}
