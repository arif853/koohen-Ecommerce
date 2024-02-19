  @extends('layouts.admin')
  @section('title','POS SYSTEM')
  @section('content')

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-7 ">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="dropdown">
                                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-tags"></i>All Category
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                      <li><a class="dropdown-item" href="#">Action</a></li>
                                      <li><a class="dropdown-item" href="#">Another action</a></li>
                                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>

                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <form action="#" class="search-wrap">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search By Product Name or SKU" id="product_search">
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">

                        <table class="table table-hover shopping-cart-wrap" id="productTable">
                            <thead class="text-muted">
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col" width="120">Stock</th>
                                    <th scope="col" width="120">Color</th>
                                    <th scope="col" width="120">Size</th>
                                    <th scope="col" width="120" class="text-center">Price</th>
                                    <th scope="col" class="text-end" >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <figure class="media">
                                            <figcaption class="media-body">
                                                <h6 class="title text-truncate">{{$product->product_name}}</h6>
                                                <small>{{$product->sku}}</small>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td class="">
                                    <span>{{$product->stock}}</span>
                                    </td>
                                    <td>
                                    <select name="colors" class="form-control" id="colorSelect" data-product-color>
                                    <option value="#">Select Color</option>
                                        @foreach ($product->colors as $color)
                                            <option value="{{$color->id}}">{{$color->color_name}}</option>
                                        @endforeach
                                    </select>
                                    </td>
                                    <td>
                                    <select name="sizes" class="form-control" id="sizeSelect" data-product-size>
                                    <option value="#">Select Size</option>
                                        @foreach ($product->sizes as $size )
                                            <option value="{{$size->id}}">{{$size->size_name}}</option>
                                        @endforeach
                                    </select>
                                    </td>
                                    <td class="text-center">
                                    <div class="price-wrap">
                                    <var class="price">৳{{$product->regular_price}}</var>
                                    </div>
                                    </td>
                                    <td class="text-end">
                                    <a href="#" class="btn btn-outline-primary addToCarts" data-product-id="{{$product->id}}"><i class="fa-solid fa-plus"></i></a>
                                    </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <style>
                .form-input{
                    width: 70px;
                    height: 40px;
                    border: 2px solid #b6b6b6;
                    border-radius: 6px;
                    padding: 10px;
                }
                .search-box{
                    position: relative;
                }
                .search-box #addNewCustomer{
                    position: absolute;
                    top: 0;
                    right: 0;

                }
                .search-box{
                    position: relative;
                }
                .search-box .customer_list{
                    position: absolute;
                    top: 50px;
                    left: 0;
                    /* height: 100%; */
                    width: 300px;
                    background-color: #fff;
                    border: 1px solid #eee;
                    z-index: 9999999;
                    padding: 15px 25px;
                    border-radius: 10px;

                }
                .customer_list li{
                    margin-bottom: 10px;
                }
                .customer-wrapper{
                    height: 100%;
                    width: 100%;
                    background-color: #fff;
                    margin-bottom: 24px;
                    -webkit-box-shadow: none;
                    box-shadow: none;
                    border: 1px solid #eee;
                    border-radius: 10px;
                    padding: 15px 25px;
                }
            </style>

            <div class="col-md-5">
                <form action="#" >
                    <div class="customer-wrapper">
                        <div class="customer-body-wrapper">
                            <a class="btn btn-primary mr-10" id="existing_customer_btn">Existing Customer</a>
                            <a class="btn btn-outline-primary" id="walk_in_customer_btn">Walk In Customer</a>

                            <div class="walking_customer mt-10" style="display: none;">
                                <input type="text" class="form-control" readonly name="walk_customer" id="walk_customer" value="Walk In Customer">
                            </div>

                            <div class="customer-search" style="display: none;">
                                <div class="mt-10 search-box">
                                    <input type="text" class="form-control searchInput" name="customer" id="searchInput" placeholder="Search customer by phone or email">
                                    <a class="btn btn-primary ml-2" id="addNewCustomer" href="#"><i class="fa-solid fa-plus"></i></a>

                                    <div id="customerList">


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <span id="cart">
                                <table class="table table-hover shopping-cart-wrap">
                                    <thead class="text-muted">
                                        <tr>
                                            <th scope="col">Item</th>
                                            <th scope="col" width="120" class="text-center">Qty</th>
                                            <th scope="col" width="120" >Price</th>
                                            <th scope="col" width="120" class="text-center">color</th>
                                            <th scope="col" width="120" class="text-center">size</th>
                                            <th scope="col" class="text-end">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach (Cart::instance('pos_cart')->content() as $item)
                                        <tr>
                                            <td>
                                            <figure class="media">

                                            <figcaption class="media-body">
                                            <h6 class="title text-truncate">{{$item->name}}</h6>
                                            </figcaption>
                                            </figure>
                                            </td>
                                            <td class="text-center">
                                            <span>{{$item->qty}}</span>
                                            </td>
                                            <td>
                                            <div class="price-wrap">
                                            <var class="price">৳{{$item->price * $item->qty }}</var>
                                            </div>
                                            </td>
                                            <td class="text-center">
                                            {{-- // '<p>' + cartItem.options.color + '</p> --}}
                                            </td>
                                            <td class="text-center">
                                            {{-- // '<p>' + cartItem.options.size + '</p>' + --}}
                                            </td>
                                            <td class="text-right">
                                            <a href="#" class="btn btn-outline-danger removeCartItems" data-row-id="{{$item->rowId}}"> <i class="fa-solid fa-xmark"></i></a>
                                            </td>
                                            </tr>
                                        <tr>
                                            @php
                                            $subtotal = $item->subtotal;
                                            $total += $subtotal;
                                            $discount = 50;
                                            @endphp
                                        @endforeach


                                    </tbody>
                                </table>
                            </span>
                        </div>

                    </div> <!-- card.// -->

                    <div class="card">
                        <div class="card-body">
                            <table class="table  shopping-cart-wrap text-end">
                                <tr >
                                    <td>Subtotal:</td>
                                    <td >
                                        @if($total > 0)
                                        ৳{{$total}}
                                        @else
                                        ৳{{$total}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Delivery Charge:</td>
                                    <td><input type="text" class="form-input" placeholder="Delivery Charge" name="" id="delivery_charge" value="0"></td>
                                </tr>
                                <tr>
                                    <td>Discount:</td>
                                    <td><input type="text" class="form-input" placeholder="Discount" name="" id="discount" value="0" ></td>
                                </tr>
                                <tr>
                                    <td>Total:</td>
                                    <td id="total">৳{{$total}}</td>
                                </tr>

                            </table>
                            <div class="row">
                                <div class="col-md-5">

                                </div>
                                <div class="col-md-7">
                                    <a href="#" class="btn btn-danger btn-block">
                                        <i class="fa-solid fa-xmark"></i> Cancel </a>
                                    <a href="#" class="btn btn-primary "><i class="fa-solid fa-bag-shopping"></i>Procced order </a>
                                </div>
                            </div>
                        </div>

                    </div> <!-- box.// -->
                </form>

            </div>
        </div>
    </div><!-- container //  -->
</section>

  @endsection
  @push('brand')
  <script>
    $(document).ready(function () {


        // Select the input fields
        var deliveryChargeInput = $('#delivery_charge');
        var discountInput = $('#discount');
        var totalElement = $('#total');

        // Attach event listeners to the input fields
        deliveryChargeInput.on('keyup', updateTotal);
        discountInput.on('keyup', updateTotal);

        function updateTotal() {
            // Get the values from the input fields, default to 0 if empty
            var deliveryCharge = parseFloat(deliveryChargeInput.val()) || 0;
            var discount = parseFloat(discountInput.val()) || 0;

            // Calculate the new total
            var newTotal = parseFloat('{{$total}}') + deliveryCharge - discount;

            // Update the total element
            totalElement.text('৳' + newTotal.toFixed(2));
        }

        // Show/hide search box based on button click
        $("#walk_in_customer_btn").click(function () {
            $(".walking_customer").show();
            $(".customer-search").hide();
        });

        $("#existing_customer_btn").click(function () {
            $(".walking_customer").hide();
            $(".customer-search").show();
        });


        $('#product_search').on('input', function () {
            var searchTerm = $(this).val().trim();
            console.log(searchTerm)

            if (searchTerm.length > 2) { // Adjust the minimum characters for search as needed
                $.ajax({
                    url: '{{ route('search.products') }}',
                    type: 'GET',
                    data: { term: searchTerm },
                    success: function (response) {
                        displaySearchResults(response);
                        console.log(response)
                    },
                    error: function (error) {
                        console.error('Error fetching search results:', error);
                    }
                });
            }
        });


        $('#searchInput').on('input', function () {
            var searchTerm = $(this).val().trim();
            console.log(searchTerm)

            if (searchTerm.length > 3) { // Adjust the minimum characters for search as needed
                $.ajax({
                    url: '{{ route('search.customer') }}',
                    type: 'GET',
                    data: { customer: searchTerm },
                    success: function (response) {

                        if (response.length > 0) {
                            $.each(response, function (index, customer) {
                        var ul = $('#customerList');
                            ul.empty();

                            var li = '<ul class="customer_list">'+
                                        '<li>'+
                                            '<a href="#">'+
                                                ' <strong>' + customer.firstName +' '+customer.lastName+ '</strong>'+
                                                ' <p>' + customer.email + '</p>'+
                                            ' </a>'+
                                        '</li>'+
                                    '</ul>';

                            ul.append(li);
                                console.log(customer.firstName);

                            });
                        }
                        else{
                            ul.empty();
                        }


                    },
                    error: function (error) {
                        console.error('Error fetching search results:', error);
                    }
                });
            }
        });

        function displaySearchResults(products) {
            var tableBody = $('#productTable tbody');
            tableBody.empty();

            if (products.length > 0) {
                $.each(products, function (index, product) {
                    var images = '';
                    var colors = '';
                    var sizes = '';

                    // Loop through product thumbnails
                    // $.each(product.product_thumbnail, function (i, thumbnail) {
                    //     images += '<img src="' + thumbnail.image_path + '" class="img-thumbnail img-xs" alt="Thumbnail">';
                    // });

                    // Loop through product colors
                    $.each(product.colors, function (i, color) {
                        colors += '<option value="' + color.id + '">' + color.color_name + '</option>';
                    });

                    // Loop through product sizes
                    $.each(product.sizes, function (i, size) {
                        sizes += '<option value="' + size.id + '">' + size.size_name + '</option>';
                    });

                    var row = '<tr>' +
                            '<td>' +
                            '<figure class="media">' +
                            // '<div class="img-wrap">' + images + '</div>' +
                            '<figcaption class="media-body">' +
                            '<h6 class="title text-truncate">' + product.product_name + '</h6>' +
                            '<small>'+product.sku+'</small>'+
                            '</figcaption>' +
                            '</figure>' +
                            '</td>' +
                            '<td class="">' +
                            '<span>' + product.stock + '</span>' +
                            '</td>' +
                            '<td>' +
                            '<select name="colors" class="form-control" id="colorSelect" data-product-color>' +
                            '<option value="#">Select Color</option>' +
                            colors +
                            '</select>' +
                            '</td>' +
                            '<td>' +
                            '<select name="sizes" class="form-control" id="sizeSelect" data-product-size>' +
                            '<option value="#">Select Size</option>' +
                            sizes +
                            '</select>' +
                            '</td>' +
                            '<td class="text-center">' +
                            '<div class="price-wrap">' +
                            '<var class="price">৳' + product.regular_price + '</var>' +
                            '</div>' +
                            '</td>' +
                            '<td class="text-end">' +
                            '<a href="#" class="btn btn-outline-primary addToCart" data-product-id="' + product.id + '"><i class="fa-solid fa-plus"></i></a>' +
                            '</td>' +
                            '</tr>';

                    tableBody.append(row);
                });
            } else {
                tableBody.append('<tr><td colspan="2">No products found</td></tr>');
            }

            $('.addToCart').click(function (e) {
                e.preventDefault();

                var productId = $(this).data('product-id');
                var selectedColor = $(this).closest('tr').find('[data-product-color]').val();
                var selectedSize = $(this).closest('tr').find('[data-product-size]').val();

                // console.log(productId);
                // console.log(selectedColor);
                // console.log(selectedSize);

                $.ajax({
                    url: '/dashboard/pos_cart/' + productId,
                    method: 'GET',
                    data: {
                        color: selectedColor,
                        size: selectedSize,
                    },
                    success: function (response) {
                        console.log(response);
                        updateCartTable(response);
                        location.reload();
                        // $.Notification.autoHideNotify('success', 'top right', 'Bingo!!', response.message);
                        // You can update the cart icon or any other part of the UI here
                    },
                    error: function (error) {
                        console.error('Error adding product to cart:', error);
                    }
                });
            });
        }

        $('.addToCarts').click(function (e) {
            e.preventDefault();

            var productId = $(this).data('product-id');
            var selectedColor = $(this).closest('tr').find('[data-product-color]').val();
            var selectedSize = $(this).closest('tr').find('[data-product-size]').val();

            // console.log(productId);
            // console.log(selectedColor);
            // console.log(selectedSize);

            $.ajax({
                url: '/dashboard/pos_cart/' + productId,
                method: 'GET',
                data: {
                    color: selectedColor,
                    size: selectedSize,
                },
                success: function (response) {
                    location.reload();
                    updateCartTable(response);
                    // $.Notification.autoHideNotify('success', 'top right', 'Bingo!!', response.message);

                },
                error: function (error) {
                    console.error('Error adding product to cart:', error);
                }
            });
        });

        $('.removeCartItems').click(function (e) {
            e.preventDefault();
            var rowId = $(this).data('row-id');
            console.log(rowId)
            $.ajax({
                url: '/dashboard/pos_cart/cart_remove/' + rowId,
                method: 'GET',
                dataType: 'json', // Add this line to specify the expected data type

                success: function (response) {
                    updateCartTable(response.cartItems);
                    location.reload();
                    // $.Notification.autoHideNotify('danger', 'top right', 'Removed!!', response.message);

                },
                error: function (error) {
                    console.error('Error removing product from cart:', error);
                }
            });
        });

        function updateCartTable(cartItems) {
            var tableBody = $('#cart tbody');
            // tableBody.empty();
            console.log("Caritems: ",cartItems)

            $.each(cartItems, function (index, cartItem) {
                var cartPrice = cartItem.qty * cartItem.price;
                var row = '<tr>' +
                    '<td>' +
                    '<figure class="media">' +
                    // '<div class="img-wrap"><img src="' + cartItem.options.thumbnail + '" class="img-thumbnail img-xs"></div>' +
                    '<figcaption class="media-body">' +
                    '<h6 class="title text-truncate">' + cartItem.name + '</h6>' +
                    '</figcaption>' +
                    '</figure>' +
                    '</td>' +
                    '<td class="text-center">' +
                    '<span>' + cartItem.qty + '</span>' +
                    '</td>' +
                    '<td>' +
                    '<div class="price-wrap">' +
                    '<var class="price">৳' + cartItem.qty * cartItem.price + '</var>' +
                    '</div>' +
                    '</td>' +
                    '<td class="text-center">' +
                    // '<p>' + cartItem.options.color + '</p>' +
                    '</td>' +
                    '<td class="text-center">' +
                    // '<p>' + cartItem.options.size + '</p>' +
                    '</td>' +
                    '<td class="text-right">' +
                    '<a href="#" class="btn btn-outline-danger removeCartItem" data-row-id="' + cartItem.rowId + '"> <i class="fa-solid fa-xmark"></i></a>' +
                    '</td>' +
                    '</tr>';

                tableBody.append(row);
            });

            $('.removeCartItem').click(function (e) {
                e.preventDefault();
                var rowId = $(this).data('row-id');
                console.log(rowId)
                $.ajax({
                    url: '/dashboard/pos_cart/cart_remove/' + rowId,
                    method: 'GET',
                    dataType: 'json', // Add this line to specify the expected data type

                    success: function (response) {
                        updateCartTable(response.cartItems);
                        location.reload();
                        // $.Notification.autoHideNotify('danger', 'top right', 'Removed!!', response.message);

                    },
                    error: function (error) {
                        console.error('Error removing product from cart:', error);
                    }
                });
            });
        }

    });
</script>
  @endpush
