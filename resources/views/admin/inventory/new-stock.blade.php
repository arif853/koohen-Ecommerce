<!-- Modal -->
<div class="modal fade" id="NewStockModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Stock</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        {{-- <div class="category_form" id="category_form"></div> --}}
        <form id="newStock">

            <div class="modal-body">
                <input type="hidden" name="product_id" id="product_id" >
                <input type="hidden" name="old_stock" id="old_stock" >
                <div class="row g-3">
                    <div class="col-md-12 mb-2">
                        <label for="product_name" class="form-label">Product</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product" readonly>
                    </div>

                    <div class="col-md-12 mb-2">
                      <label for="supplier" class="form-label">Supplier</label>
                      <input type="text" class="form-control" id="supplier" name="supplier" readonly>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="new_stock" class="form-label">Quantity<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="new_stock" name="new_stock" value="0">
                    </div>

                    {{-- <div class="col-12 mb-2">
                      <div class="form-check ml-20">
                          <label class="form-check-label" for="status">
                            <input class="form-check-input" type="checkbox" checked name="status" id="status">
                          Publish
                        </label>
                      </div> --}}

                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Add</button>
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
