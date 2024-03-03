  @extends('layouts.admin')
  @section('title','POS SYSTEM')
  @section('content')
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

    .select-form {
        background-color: #f4f5f9;
        border: 2px solid #f4f5f9;
        font-size: 13px;
        -webkit-box-shadow: none;
        box-shadow: none;
        color: #4f5d77;
        /* width: 50%; */
        border-radius: 4px;
        height: 45px;
        padding-left: 15px;
    }
</style>

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-7 ">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-0">
                                {{-- <div class="dropdown">
                                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-tags"></i>All Category
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                      <li><a class="dropdown-item" href="#">Action</a></li>
                                      <li><a class="dropdown-item" href="#">Another action</a></li>
                                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div> --}}

                            </div>
                            <div class="col-lg-8 col-sm-6">
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
                                    <option value="">Select Color</option>
                                        @foreach ($product->colors as $color)
                                            <option value="{{$color->id}}">{{$color->color_name}}</option>
                                        @endforeach
                                    </select>
                                    </td>
                                    <td>
                                    <select name="sizes" class="form-control" id="sizeSelect" data-product-size>
                                    <option value="">Select Size</option>
                                        @foreach ($product->sizes as $size )
                                            <option value="{{$size->id}}">{{$size->size_name}}</option>
                                        @endforeach
                                    </select>
                                    </td>
                                    <td class="text-center">
                                        <div class="price-wrap">
                                            <var class="price">
                                                <input type="text" class="form-input" name="price" value="{{$product->regular_price}}" data-product-price>
                                            </var>
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

            <div class="col-md-5">
                <form action="#" id="pos_order_form">
                    <div class="customer-wrapper">
                        <div class="customer-body-wrapper">
                            <a class="btn btn-primary mr-10" id="existing_customer_btn">Existing Customer</a>
                            <a class="btn btn-outline-primary" id="walk_in_customer_btn" data-bs-toggle="modal" data-bs-target="#newCustomer">New Customer</a>

                            <div class="new_customer mt-20" style="display: none;">
                                <ul id="newCustomerList">

                                </ul>
                            </div>

                            <div class="customer-search" style="display: none;">
                                <div class="mt-20 search-box">
                                    <input type="text" class="form-control searchInput" id="searchInput" placeholder="Search customer by phone or email">
                                    {{-- <a class="btn btn-primary ml-2" id="addNewCustomer" href="#"><i class="fa-solid fa-plus"></i></a> --}}

                                    <div id="customerList">
                                        <ul >
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            {{-- <input type="hidden" class="selectedcustomerid" id="selectedCustomerId" name="customer"> --}}
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
                                                    @php
                                                    $color = DB::table('colors')->where('id', $item->options->color)->first();
                                                    if ($color) {
                                                        // Access the properties of $color
                                                        $colorName = $color->color_name;
                                                    } else {
                                                        // Handle the case when no record is found
                                                        $colorName = 'No color';
                                                    }
                                                    @endphp
                                                <p>{{$colorName}}</p>
                                            </td>
                                            <td class="text-center">
                                                @php
                                                $size = DB::table('sizes')->where('id', $item->options->size)->first();
                                                if ($size) {
                                                    // Access the properties of $color
                                                    $sizeName = $size->size;
                                                } else {
                                                    // Handle the case when no record is found
                                                    $sizeName = 'No size';
                                                }
                                                @endphp
                                            <p>{{$sizeName}}</p>

                                            </td>
                                            <td class="text-right">
                                            <a href="#" class="btn btn-outline-danger removeCartItems" data-row-id="{{$item->rowId}}"> <i class="fa-solid fa-xmark"></i></a>
                                            </td>
                                            </tr>
                                        <tr>
                                            @php
                                            $subtotal = $item->subtotal;
                                            $total += $subtotal;
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
                                    <td colspan="2">Subtotal:</td>
                                    <td >
                                        @if($total > 0)
                                        ৳{{$total}}
                                        <input type="hidden" name="subtotal" id="psubtotal" value="{{$total}}">
                                        @else
                                        ৳{{$total}}
                                        <input type="hidden" name="subtotal" id="psubtotal" value="{{$total}}">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Delivery Charge:</td>
                                    <td><input type="text" class="form-input" placeholder="Delivery Charge" name="delivery_charge" id="delivery_charge" ></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Discount:</td>
                                    <td><input type="text" class="form-input" placeholder="Discount" name="discount" id="discount" ></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Total:</td>
                                    <td id="total">৳{{$total}}</td>
                                    <input type="hidden" name="total" id="g_total" value="{{$total}}">
                                </tr>
                                <tr>
                                    <td colspan="2">Order From:</td>
                                    <td >
                                        <select name="order_from" id="orderFrom" class="select-form">
                                            <option value=""> --Select order from-- </option>
                                            <option value="WalkInCustomer">Walk In Customer</option>
                                            <option value="Facebook">Facebook</option>
                                            <option value="Koohen">Koohen</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <div class="row">
                                <div class="col-md-5">

                                </div>
                                <div class="col-md-7">
                                    <a href="#" class="btn btn-danger btn-block" id="order_cancel">
                                        <i class="fa-solid fa-xmark"></i> Cancel </a>
                                    <a href="#" class="btn btn-primary " id="proceed_order_btn"><i class="fa-solid fa-bag-shopping"></i>Procced order </a>
                                </div>
                            </div>
                        </div>

                    </div> <!-- box.// -->
                </form>

            </div>
        </div>
    </div><!-- container //  -->

</section>

    <!-- Modal -->
    <div class="modal fade" id="newCustomer" tabindex="-1" aria-labelledby="newCustomerLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="newCustomerLabel">New Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">

                        <div class="col-md-12">
                            <label for="customerName" class="form-label">Customer Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="customerName" name="customerName" required>
                        </div>

                        <div class="col-md-12">
                            <label for="customerPhone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="customerPhone" name="customerPhone" required>
                        </div>

                        <div class="col-md-12 ">
                            <label class="form-label" for="customerAddress">Address</label>
                            <input class="form-control" type="text" id="customerAddress" name="customerAddress">
                        </div>

                        {{-- <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div> --}}
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="addNewCustomer" data-bs-dismiss="modal">Add</button>
                </div>
            </div>
        </div>
    </div>

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
            $('#g_total').val(newTotal.toFixed(2));
        }

        // Show/hide search box based on button click
        $("#walk_in_customer_btn").click(function () {
            $(".new_customer").show();
            $(".customer-search").hide();
        });

        $("#existing_customer_btn").click(function () {
            $(".new_customer").hide();
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


        function handleSearch() {
            var searchTerm = $(this).val().trim();
            // console.log(searchTerm)

            if (searchTerm.length > 1) { // Adjust the minimum characters for search as needed
                $.ajax({
                    url: '{{ route('search.customer') }}',
                    type: 'GET',
                    data: { customer: searchTerm },
                    success: function (response) {
                        // console.log(response);
                        var ul = $('#customerList ul');
                            ul.empty();
                        if (response.length > 0) {

                            ul.addClass('customer_list');
                            $.each(response, function (index, customer) {
                            var li ='<li>'+
                                            '<a href="#" class="select_customer">'+
                                                ' <strong>'+ customer.firstName +' '+customer.lastName+ '</strong>'+
                                                ' <p>' + customer.email + '</p>'+
                                                '<input type="hidden" name="customer_id" data-customer-id="'+customer.id+'">'+
                                            ' </a>'+
                                        '</li>';

                            ul.append(li);
                                // console.log(customer.firstName);

                            });

                            $(document).on('click', '.customer_list a', function (e) {
                                e.preventDefault();

                                // Extract customer details from the selected item
                                var selectedCustomer = $(this).find('strong').text() + '<br> ' + $(this).find('p').text();
                                var selectedCustomerId = $(this).find('input').data('customer-id'); // Assuming you set the data-customer-id attribute in your HTML

                                // Update the customer-search section with remove button
                                var selectedCustomerHTML = '<div class="selected-customer">' +
                                                                '<p class="mt-5">' + selectedCustomer + '</p>' +
                                                                '<input type="hidden" id="ex_customer" name="customer_id" data-customer-id="'+selectedCustomerId+'">'+
                                                                '<a href="#" class="remove-customer"><i class="fa-solid fa-xmark"></i> Remove</a>' +
                                                            '</div>';

                                $('.customer-search').empty().html(selectedCustomerHTML);

                                // Update the hidden input field with the selected customer's ID
                                $('#selectedCustomerId').val(selectedCustomerId);
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
            else {
                // Clear the list if the input is invalid or empty
                var ul = $('#customerList ul');
                ul.removeClass('customer_list').empty();
            }
        };

        $('#searchInput').on('input', handleSearch);

        // Add click event for removing the selected customer
        $(document).on('click', '.remove-customer', function (e) {
            e.preventDefault();

            // Clear the selected customer and re-bind the search input
            $('.customer-search').empty().html('<div class="mt-10 search-box">' +
                '<input type="text" class="form-control searchInput" name="customer" id="searchInput" placeholder="Search customer by phone or email">' +
                '<a class="btn btn-primary ml-2" id="addNewCustomer" href="#"><i class="fa-solid fa-plus"></i></a>' +
                '<div id="customerList">' +
                ' <ul ></ul>' +
                '</div>' +
                '</div>');
            $('#selectedCustomerId').val('');

            // Re-bind the input event for the search functionality
            $('#searchInput').on('input', handleSearch);
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
                            '<var class="price">' +
                                '<input type="text" class="form-input" name="price" value="' + product.regular_price + '" data-product-price>'+
                            '</var>' +
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
                var productPrice = $(this).closest('tr').find('[data-product-price]').val();

                // console.log(productId);
                // console.log(selectedColor);
                console.log(productPrice);

                $.ajax({
                    url: '/dashboard/pos_cart/' + productId,
                    method: 'GET',
                    data: {
                        color: selectedColor,
                        size: selectedSize,
                        price: productPrice,
                    },
                    success: function (response) {
                        // console.log(response);
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
            var productPrice = $(this).closest('tr').find('[data-product-price]').val();

            // console.log(productId);
            // console.log(selectedColor);
            console.log(selectedSize);

            $.ajax({
                url: '/dashboard/pos_cart/' + productId,
                method: 'GET',
                data: {
                    color: selectedColor,
                    size: selectedSize,
                    price: productPrice,

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

        $('#order_cancel').click(function (e) {
            e.preventDefault();

            $.ajax({
                url: '/dashboard/pos/order_cancel',
                method: 'GET',

                success: function (response) {
                    $('#customerList').empty();
                    $('#selectedCustomerId').val('');
                    location.reload();
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


        // Array to store new customer data
        var newCustomers = [];

        // Function to add a new customer to the array and update the list
        function addNewCustomer() {
            var customerName = document.getElementById('customerName').value;
            var customerPhone = document.getElementById('customerPhone').value;
            var customerAddress = document.getElementById('customerAddress').value;

            // Validate if required fields are not empty
            if (customerName.trim() === "" || customerPhone.trim() === "") {
                alert("Please enter customer name and phone.");
                return;
            }

            // Clear the existing customers before adding the new one
            newCustomers = [];

            // Add new customer to the array
            newCustomers.push({
                name: customerName,
                phone: customerPhone,
                address: customerAddress
            });

            // Update the customer list
            updateCustomerList();

            // Clear the modal fields
            document.getElementById('customerName').value = '';
            document.getElementById('customerPhone').value = '';
            document.getElementById('customerAddress').value = '';

            // Close the modal
            var modal = new bootstrap.Modal(document.getElementById('newCustomer'));
            modal.hide();
        }

        // Function to remove a customer from the array and update the list
        function removeCustomer(index) {
            newCustomers.splice(index, 1);
            updateCustomerList();
        }

        // Function to update the customer list in the HTML
        function updateCustomerList() {
            var customerList = document.getElementById('newCustomerList');
            customerList.innerHTML = ''; // Clear the existing list

            // Iterate through the new customers array and update the list
            newCustomers.forEach(function (customer, index) {
                var listItem = document.createElement('li');
                listItem.textContent = customer.name + ' - ' + customer.phone;

                // Add a remove button to each customer
                var removeBtn = document.createElement('button');
                removeBtn.innerHTML = '<i class="fa-solid fa-xmark"></i>';
                removeBtn.className = 'btn btn-danger btn-sm ';
                removeBtn.addEventListener('click', function () {
                    removeCustomer(index);
                });


                listItem.appendChild(removeBtn);
                customerList.appendChild(listItem);
            });
        }

        // Event listener for the "Add" button in the modal
        document.getElementById('addNewCustomer').addEventListener('click', addNewCustomer);


        //pos order

        $('#proceed_order_btn').on('click', function (e) {
            e.preventDefault();

            // var formData = $('#pos_order_form').serialize();
            var selectedCustomerId = $('.selected-customer').find('input').data('customer-id');
            var customer;
            var newCustomer;

            if (selectedCustomerId !== undefined && selectedCustomerId !== null && selectedCustomerId !== '') {
                // Existing customer selected
                customer = selectedCustomerId;
                newCustomer = null; // Set newCustomer to null for clarity
            } else {
                // New customer selected
                customer = null;
                newCustomer = newCustomers;
                // console.log(newCustomer);
            }
            // var customer =
            var psubtotal = $('#psubtotal').val();
            var delivery_cost = $('#delivery_charge').val();
            var discount = $('#discount').val();
            var total = $('#g_total').val();
            var order_from = $('#orderFrom').val();

            console.log(psubtotal);
            console.log(delivery_cost);
            console.log(discount);
            console.log(total);

            $.ajax({
                type: 'POST',
                url: '/dashboard/pos/store', // Update with your route
                data: {
                    _token: '{{ csrf_token() }}',
                    customer: customer,
                    subtotal: psubtotal,
                    delivery_charge: delivery_cost,
                    discount: discount,
                    total: total,
                    newCustomer: newCustomers,
                    orderFrom : order_from,
                },
                success: function (response) {
                    // Handle success response
                    window.open(response, '_blank');
                    location.reload();
                    // console.log(response);
                    // Open the invoice in a new tab
                },
                error: function (error) {
                    // Handle error
                    console.log(error);
                }
            });
        });

    });
</script>
  @endpush

