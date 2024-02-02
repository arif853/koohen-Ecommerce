@extends('layouts.admin')
@section('title','Manage Categories')
@section('content')

<div class="content-header">
    <div>
        <h2 class="content-title card-title">Category List</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{'/dashborad'}}">Dashborad</a></li>
              <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
        </nav>
    </div>
    <div>
        {{-- <a href="#" class="btn btn-primary btn-sm rounded">Add New category</a> --}}
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm rounded" data-bs-toggle="modal" data-bs-target="#categoryModal">
            New Category
        </button>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card mb-4">
            <header class="card-header">
                <div class="row gx-3">
                    <div class="col-lg-4 mb-lg-0 mb-15 me-auto">
                        <input type="text" placeholder="Search..." class="form-control">
                    </div>
                    {{-- <div class="col-lg-2 col-6">
                        <div class="custom_select">
                            <select class="form-select select-nice">
                                <option selected>Categories</option>
                                <option>Technology</option>
                                <option>Fashion</option>
                                <option>Home Decor</option>
                                <option>Healthy</option>
                                <option>Travel</option>
                                <option>Auto-car</option>
                            </select>
                        </div>
                    </div> --}}
                    <div class="col-lg-2 col-6">
                        <input type="date" class="form-control" name="">
                    </div>
                </div>
            </header> <!-- card-header end// -->
            <div class="card-body">
                <div class="row gx-3">
                    @foreach ($categories as $category)
                        <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                            <figure class="card border-1 card-bg">
                                <div class="brand-overlay">
                                    <div class="action-icon">
                                        <form class="deleteForm" action="{{ route('category.destroy', $category->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" class="edit-category" data-bs-toggle="modal" data-bs-target="#categoryModalEdit" data-category-id="{{ $category->id}}"><i class="fa-regular fa-pen-to-square"></i></a>

                                            <a href="#" class="delete_category" ><i class="fa-regular fa-trash-can"></i></a>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-header bg-white text-center">
                                    <img width="100%" src="{{asset('storage/category_image/'.$category->category_image)}}" class="img-fluid" alt="{{$category->slug}}">
                                </div>
                                <figcaption class="card-body text-center">
                                    <h6 class="card-title m-0">{{$category->category_name}}</h6>
                                    <a href="#"> 398 items </a>
                                </figcaption>
                            </figure>
                        </div> <!-- col.// -->
                    @endforeach


                </div> <!-- row.// -->
            </div> <!-- card-body end// -->
        </div> <!-- card end// -->
    </div>
</div>

@include('admin.category.edit')

@include('admin.category.create')
@endsection

@push('category')
<script>


        // Edit Category
        $(document).on('click', '.edit-category', function (e) {
            e.preventDefault();
            var categoryId = $(this).data('category-id');
            // console.log(brandId);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/dashboard/category/edit',
                method: 'GET',
                data: {
                    id: categoryId,
                },
                success: function (response) {
                    $('#category_id').val(response.id);
                    $('#category_name').val(response.category_name);
                    $('#status').prop('checked', response.status == 1);

                    const outputImage = document.getElementById('output-image2');
                    outputImage.src = "{{asset('storage/category_image')}}"+'/'+response.category_image
                    // $('#output-image2').val(response.brand_image);
                    // $("#edit_modal_form").modal('show');
                    // console.log(response)
                }
            });
        });

        //Update Category
        $("#categoryEditForm").submit(function (e) {
            e.preventDefault();
            const data = new FormData(this);
            // console.log(data);
            $.ajax({
                url: '/dashboard/category/update',
                method: 'post',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                success: function (res) {
                    if (res.status == 200) {
                        $("#categoryModalEdit").modal('hide');
                        location.reload();
                        // $.Notification.autoHideNotify('success', 'top right', 'Success', res.message);
                    }
                    else{
                        $.Notification.autoHideNotify('danger', 'top right', 'Danger', res.message);

                    }
                }
            })
        });


    document.querySelectorAll('.delete_category').forEach(function (element) {
        element.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent the default link behavior
            console.log('click');
            // Find the closest form element related to the clicked link
            var form = this.closest('form');

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
