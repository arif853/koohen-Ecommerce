  <!-- Modal -->
<div class="modal fade" id="supplierModal"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">New Supplier</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{url('dashboard/supplier/store')}}" method="POST">
            @csrf
            @method('POST')
            <div class="modal-body p-6">

                <div class="row mb-4">
                    <div class="form-group col-md-12">
                        <label for="supplier_name" class="form-label">Supplier Name</label>
                        <input type="text" class="form-control" id="supplier_name" name="supplier_name" placeholder="Supplier_name" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="form-group col-md-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
                    </div>
                </div>
                <div class="form-row row mb-4">
                    <div class="form-group col-md-6">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email address">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
                    </div>
                </div>

                {{-- <div class="form-row row mb-4">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control">
                        <option selected>Choose...</option>
                        <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                </div> --}}
                <div class="row">
                    <div class="form-group col-md-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="status" id="status">
                            <label class="form-check-label" for="status">
                            Active
                            </label>
                        </div>
                    </div>
                </div>

                {{-- <button type="submit" class="btn btn-primary">Sign in</button> --}}
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
</div>

