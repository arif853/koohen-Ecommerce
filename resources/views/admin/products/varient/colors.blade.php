<!-- Modal -->
<div class="modal fade" id="colorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Color</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="brand_form" id="brand_form"></div>
        <form action="{{route('color.store')}}" method="post">
            @csrf
            @method('POST')
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-12 mb-2">
                      <label for="validationDefault01" class="form-label">Choose Color <span class="text-danger">*</span></label>
                      <input type="text" class="form-control colorpicker" id="color_code" name="color_code" required>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="validationDefault01" class="form-label"> Color Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="color_name" name="color_name" required >
                    </div>

                    <div class="col-12  mb-2">
                      <div class="form-check ml-10">
                        <input class="form-check-input" type="checkbox" name="status" id="invalidCheck2">
                        <label class="form-check-label" for="invalidCheck2">Publish</label>
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


