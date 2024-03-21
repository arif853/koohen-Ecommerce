{{-- Modal subcategory add --}}

<!-- Modal -->
<div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="roleModelLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">New Role</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        {{-- <div class="category_form" id="category_form"></div> --}}
        <form id="roleStoreForm">
            @csrf
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-12 mb-2">
                        <label for="name" class="form-label">Role Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Role Name" required>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>
</div>


