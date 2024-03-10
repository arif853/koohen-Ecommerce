@extends('layouts.admin')
@section('title','Supplier')
@section('content')

<div class="content-header">
    <div>
        <h2 class="content-title card-title">Supplier List</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{'/dashborad'}}">Dashborad</a></li>
              <li class="breadcrumb-item active" aria-current="page">Supplier</li>
            </ol>
        </nav>
    </div>
    <div>

        <a href="#" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#supplierModal"><i class="material-icons md-plus"></i> Add Supplier</a>
    </div>
</div>
<div class="card mb-4">
    <header class="card-header">
        <div class="row gx-3">
            <div class="col-lg-4 col-md-6 me-auto">
                <input type="text" placeholder="Search..." class="form-control">
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <select class="form-select">
                    <option>Status</option>
                    <option>Active</option>
                    <option>Disabled</option>
                    <option>Show all</option>
                </select>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <select class="form-select">
                    <option>Show 20</option>
                    <option>Show 30</option>
                    <option>Show 40</option>
                </select>
            </div>
        </div>
    </header> <!-- card-header end// -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover" id="datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Supplier</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Balance</th>
                        <th>Added on</th>
                        <th>Status</th>
                        <th class="text-end"> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $key => $supplier)
                    <tr>
                        <th>{{$key+1}}</th>
                        <td>

                            <div class="info pl-3">
                                <h6 class="mb-0 title">{{$supplier->supplier_name}}</h6>
                                <small class="text-muted">Supplier ID: #{{$supplier->id}}</small>
                            </div>
                        </td>
                        <td>{{$supplier->address}}</td>
                        <td>{{$supplier->phone}}</td>
                        <td>{{$supplier->email}}</td>

                        <td>{{$supplier->balance}}</td>
                        <td>{{$supplier->created_at->format('d-m-Y')}}</td>
                        <td>
                            @if($supplier->status == 'Active')
                            <span class="badge rounded-pill alert-success">{{$supplier->status}}</span>

                            @else
                            <span class="badge rounded-pill alert-danger">{{$supplier->status}}</span>

                            @endif
                        </td>
                        <td class="text-end">
                            <form class="deleteForm" action="{{route('supplier.destroy', ['id' => $supplier->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="#" data-bs-toggle="modal" data-bs-target="#supplierModalEdit" data-supplier-id="{{$supplier->id}}" class="btn btn-sm btn-brand rounded font-sm mt-15 edit-supplier">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger rounded font-sm mt-15 delete_supplier">Delete</a>
                            </form>
                        </td>
                    </tr>

                    @endforeach


                </tbody>
            </table> <!-- table-responsive.// -->
        </div>
    </div> <!-- card-body end// -->
</div> <!-- card end// -->


@include('admin.supplier.edit')
@include('admin.supplier.create')

@endsection

@push('subcategory')
<script>

    // Edit Brand
    $(document).on('click', '.edit-supplier', function (e) {
        e.preventDefault();
        var supplierId = $(this).data('supplier-id');
        // console.log(supplierId);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/dashboard/supplier/edit',
            method: 'GET',
            data: {
                id: supplierId,
            },
            success: function (response) {
                $('#supplier_id').val(response.id);
                $('#supplier_name').val(response.supplier_name);
                $('#s_address').val(response.address);
                $('#s_phone').val(response.phone);
                $('#s_email').val(response.email);
                $('#s_status').prop('checked', response.status == 'Active');
            }
        });
    });

    //Update Brand
    $("#updateSupplier").submit(function (e) {
        e.preventDefault();
        const data = new FormData(this);
        $.ajax({
            url: '/dashboard/supplier/update',
            method: 'post',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            success: function (res) {
                if (res.status == 200) {
                    // $("#brandEditForm").modal('hide');
                    location.reload();
                    // $.Notification.autoHideNotify('success', 'top right', 'Success', res.message);
                }
                else{
                    $.Notification.autoHideNotify('danger', 'top right', 'Danger', res.message);

                }
            }
        })
    });


    document.querySelectorAll('.delete_supplier').forEach(function (element) {
        element.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent the default link behavior
            console.log('click');
            // Find the closest form element related to the clicked link
            var form = this.closest('form');
            // console.log(form);
            // Display SweetAlert confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                // If confirmed, submit the corresponding form
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endpush
