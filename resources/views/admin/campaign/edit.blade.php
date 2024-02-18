<<<<<<< HEAD
<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
</div>
=======


@extends('layouts.admin')
@section('title','Campaign')
@section('content')

<style>
    .card{
        position: relative;
    }
    a.rm-btn {

        color: rgb(129, 0, 0);
        font-size: 22px;
        position: absolute;
        top: 5px;
        right: 25px;
    }
    a.adds-btn {
        height: 100%;
        width: 100px;
        line-height: 34px;
        border-radius: 4px;
        text-align: center;
        background-color: rgba(8, 129, 120, 1);
        border: 2px solid rgba(8, 129, 120, 1);
        color: #ffffff;
        transition: all .4s;
        display: inline-block;
    }
    small{
        font-size: 11px !important;
    }
</style>
<div>

    {{-- <h2>Happiness is not something readymade. It comes from your own actions. - Dalai Lama</h2> --}}

    <div>
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">New Campaign</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{'/dashborad'}}">Dashborad</a></li>
                      <li class="breadcrumb-item" aria-current="page">Campaign</li>
                      <li class="breadcrumb-item active" aria-current="page">New Campaign</li>
                    </ol>
                </nav>

            </div>
            <div>
                <a href="javascript:history.back()"><i class="material-icons md-arrow_back"></i> Go back </a>
                {{-- <a href="{{route('campaign.edit')}}" class="btn btn-primary mt-md-0 mt-2 pull-right">New Campaign</a> --}}

            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>New Campaign</h4>
                    </div>
                    <form action="{{route('campaign.update',$campaign->id)}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @method('POST')
                        <div class="card-body ">

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <label for="camp_name" class="form-label">Campaign Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="camp_name" id="camp_name" value="{{$campaign->camp_name}}">
                                            </div>
                                            <div class="mb-4">
                                                <label for="camp_image" class="form-label">Campaign Image <span class="text-danger">*</span></label>
                                                <input type="file" class="form-control" name="camp_image" id="camp_image" value="{{$campaign->image}}">
                                            </div>

                                            <div class="mb-4">
                                                <img src="{{asset('storage/'.$campaign->image)}}" alt="{{$campaign->camp_name}}" width="150">
                                            </div>

                                            <div class="mb-4">
                                                <label for="camp_name" class="form-label">Campaign Status</label>
                                                <select name="status" id="status" class="form-control" value={{$campaign->status}}>
                                                    <option value="Published" {{$campaign->status == "Published" ? 'selected':''}}>Published</option>
                                                    <option value="Draft" {{$campaign->status == "Draft" ? 'selected':''}}>Draft</option>
                                                </select>
                                                {{-- <input type="text" class="form-control" name="camp_name" id="camp_name" placeholder="Campaign Name"> --}}
                                            </div>

                                            <div class="mb-4">
                                                <label for="camp_offer" class="form-label"> Campaign Offer<small> ( Set Fix Percentage for Campaign Offer ) </small></label>
                                                <input type="number" class="form-control" name="camp_offer" id="camp_offer" value="{{$campaign->camp_offer}}">
                                                <button class="mt-2" id="sync_all_btn">Syn Price</button>
                                            </div>
                                            <div class="mb-4">
                                                <label for="start_date" class="form-label">Start Date</label>
                                                <input type="datetime-local" class="form-control" name="start_date" id="start_date" value="{{$campaign->start_date}}">
                                            </div>
                                            <div class="mb-4">
                                                <label for="end_date" class="form-label">End Date</label>
                                                <input type="datetime-local" class="form-control" name="end_date" id="end_date" value="{{$campaign->end_date}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="more_product" id="more_product">
                                        @foreach ($campaign->camp_product as $item)
                                        {{-- {{$item->id}} --}}
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-4">
                                                            <label for="product" class="form-label">Select Product</label>
                                                            <select name="product[]" id="product_{{$item->id}}" class="select-nice" onchange="updateRegularPrice(this)">
                                                                <option value="">-- Select Product --</option>
                                                                @foreach ($products as $product)

                                                                <option value="{{$product->id}}" {{ $item->product_id == $product->id ? 'selected' : '' }}
                                                                    data-stock="{{$product->stock}}" data-regular-price ="{{$product->regular_price}}">{{$product->product_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-4">
                                                            <label for="regular_price" class="form-label">Regular Price</label>
                                                           <input type="text" class="form-control" name="regular_price[]" value="{{$item->regular_price}}" id="regular_price" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-4">
                                                            <label for="stock" class="form-label">Available Stock</label>
                                                           <input type="text" class="form-control" name="stock[]" value="{{$item->camp_qty}}" id="stock" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-4">
                                                            <label for="campaign_price" class="form-label">Campaign Price</label>
                                                           <input type="text" class="form-control" name="campaign_price[]" value="{{$item->camp_price}}" id="campaign_price">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="rm-btn item-rm" href="#"  onclick="event.preventDefault();" data-item-id="{{$item->id}}"> <i class="fa-solid fa-times"></i> </a>
                                        </div>
                                        @endforeach

                                    </div>
                                    <div id="totfield" class="form-group">
                                        <input type="hidden" name="totinput" value="1">
                                    </div>

                                    <div class="action-btn ">
                                        <a class="adds-btn mt-2" href="" onclick="event.preventDefault();addfield()"> Add Product </a>
                                        <button class="btn btn-primary pull-right" type="submit">Save</button>
                                        {{-- <a class="remove-btn mt-4" href="" onclick="event.preventDefault();removeField()"> <i class="fa-solid fa-times"></i> </a> --}}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>


@endsection
@push('product')
<script>

 //   Delete thumbnail
 document.querySelectorAll('.item-rm').forEach(function(element) {
        element.addEventListener('click', function(e) {
            e.preventDefault();

            // Get the product image ID
            var itemId = element.getAttribute('data-item-id');
                console.log(itemId);
            // Show SweetAlert confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'

            }).then((result) => {
                if (result.isConfirmed) {
                    // If user confirms, redirect to the delete route with the product image ID
                    // window.location.href = "{{ route('productsimage.destroy','') }}/" + productImageId;
                    $.ajax({
                    url: "{{ url('/dashboard/campaign/camp_item/delete/') }}",
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id : itemId,
                    },
                    success: function (response) {
                        // Handle success, e.g., show a success message
                        // Optionally, you can refresh the page or update the UI
                        location.reload();
                        Swal.fire('Deleted!', 'Your file has been deleted.', 'success');
                    },
                    error: function (xhr, status, error) {
                        // Handle error, e.g., show an error message
                        Swal.fire('Error!', 'An error occurred while deleting the file.', 'error');
                    }
                });
                }
            });
        });
    });

    var i = 1;
    function addfield(){
        // Assuming you have a variable 'products' containing the encoded product data
        var productData = {!! json_encode($products) !!};

        // Generate product options dynamically
        var productOptions = '<option value="">-- Select Product --</option>';
        productData.forEach(function (product) {
            productOptions += '<option value="' + product.id + '" data-stock="' + product.stock + '" data-regular-price="' + product.regular_price + '">' + product.product_name + '</option>';
        });
    i++;
    var data = '<div class="card">'+
                    '<div class="card-body">'+
                        ' <div class="row">'+
                            '<div class="col-lg-6">'+
                                '<div class="mb-4">'+
                                    '<label for="product" class="form-label">Select Product</label>'+
                                    ' <select name="product[]" id="product' + i + '" class="select-box" onchange="updateRegularPrice(this)">' +
                                        productOptions + // Insert product options here
                                    '</select>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-lg-6">'+
                                '<div class="mb-4">'+
                                    '<label for="regular_price" class="form-label">Regular Price</label>'+
                                    '<input type="text" class="form-control" name="regular_price[]" placeholder="Regular Price" id="regular_price" readonly>'+
                                '</div>'+
                            ' </div>'+
                            '<div class="col-lg-6">'+
                                '<div class="mb-4">'+
                                    '<label for="stock" class="form-label">Available Stock</label>'+
                                    '<input type="text" class="form-control" name="stock[]" placeholder="Stock" id="stock" readonly>'+
                                '</div>'+
                            '</div>'+
                            ' <div class="col-lg-6">'+
                                '<div class="mb-4">'+
                                    '<label for="campaign_price" class="form-label">Campaign Price</label>'+
                                    '<input type="text" class="form-control" name="campaign_price[]" placeholder="Campaign Price" id="campaign_price">'+
                                '</div>'+
                            '</div>'+
                        ' </div>'+
                    '</div>'+
                    '<a class="rm-btn"  onclick="event.preventDefault();removeField(this)"> <i class="fa-solid fa-times"></i> </a>'+

                '</div>';
        $("#more_product").append(data);
        var tot = '<input type="hidden" name="totinput" value="'+i+'">';
        $("#totfield").html(tot);

        if ($('.select-box').length) {
            $('.select-box').select2();
        }
    }

    function removeField(e) {
        if (i > 1) {
            var rowToRemove = e.closest('.card');
                rowToRemove.remove();

                i--;

            // Update the hidden input value
            var tot = '<input type="hidden" name="totinput" value="' + i + '">';
            $("#totfield").html(tot);
        } else {
            alert("Cannot remove the last row. At least one row is required.");
        }
    }

    // Function to update the regular price based on the selected product
    function updateRegularPrice(selectElement) {
        var selectedProduct = selectElement.options[selectElement.selectedIndex];
        var regularPriceInput = $(selectElement).closest('.row').find('[name="regular_price[]"]');
        var stock = $(selectElement).closest('.row').find('[name="stock[]"]');

        regularPriceInput.val(selectedProduct.getAttribute('data-regular-price'));
        stock.val(selectedProduct.getAttribute('data-stock'));
    }


    function syncAll() {
        var campaignOfferPercentage = parseFloat($("#camp_offer").val());
        if (isNaN(campaignOfferPercentage)) {
            alert("Please enter a valid campaign offer percentage.");
            return;
        }

        // Loop through each product row and calculate campaign price
        $(".card").each(function() {
            var regularPriceInput = $(this).find('[name="regular_price[]"]');
            var campaignPriceInput = $(this).find('[name="campaign_price[]"]');
            var regularPrice = parseFloat(regularPriceInput.val());

            if (!isNaN(regularPrice)) {
                var campaignPrice = regularPrice * (1 - campaignOfferPercentage / 100);
                campaignPriceInput.val(campaignPrice.toFixed(2));
            }
        });
    }

    // Attach click event listener to the "Sync All" button
    $(document).on("click", "#sync_all_btn", function(e) {
        e.preventDefault();
        syncAll();
    });

</script>
@endpush
>>>>>>> 71d6d2e3987b20dd12848d8991cc00ea1bbbd091
