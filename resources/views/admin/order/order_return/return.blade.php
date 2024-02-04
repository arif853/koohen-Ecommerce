{{-- Modal category add --}}

<!-- Modal -->
<div class="modal fade" id="returnModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Order Return</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="return_form" id="return_form"></div>
        <form action="#">
            <div class="modal-body">
                <form class="row g-3">
                    <div class="col-md-12 mb-4">
                      <label for="validationDefault01" class="form-label">Order No <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="validationDefault01" required>
                    </div>
                    <div class="col-md-12 mb-4">
                      <label for="validationDefault02" class="form-label">Return date</label>
                      <input type="date" class="form-control" id="imageInput" >
                    </div>
                    {{-- <div class="col-12 mb-4">
                      <div class="form-check ml-20">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                        <label class="form-check-label" for="invalidCheck2">
                          Publish
                        </label>
                      </div>

                    </div> --}}
                    {{-- <div class="col-12 mb-4">
                        <div id="image-preview">
                            <img id="output-image" src="" alt="" width="100%">
                        </div>
                    </div> --}}
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Return</button>
                      {{-- <button class="btn btn-primary" type="submit">Submit form</button> --}}
                    </div>
                </form>
            </div>
        </form>
        {{-- <div class="modal-footer">
        </div> --}}
      </div>
    </div>
</div>
