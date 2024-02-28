@extends('layouts.admin')
@section('title', 'Customer')
@section('content')

    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Customer List</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ '/dashborad' }}">Dashborad</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Customers</li>
                </ol>
            </nav>
        </div>
        {{-- <div>
            <a href="#" class="btn btn-primary"><i class="material-icons md-plus"></i> Create new</a>
        </div> --}}
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3 customer_live_search">
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text" placeholder="Customer name..." class="form-control" name="customer_name"
                        id="customer_name">
                </div>
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text" placeholder="Customer mobile number..." class="form-control" name="customer_phone"
                        id="customer_phone">
                </div>
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="email" placeholder="Customer email..." class="form-control" name="customer_email"
                        id="customer_email">
                </div>

            </div>
        </header> <!-- card-header end// -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="datatable">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Registered</th>
                            <th class="text-end"> Action </th>
                        </tr>
                    </thead>
                    <tbody id="CustomerTable">
                        @foreach ($customers as $key => $customer)
                            <tr>
                                <td>
                                    <a href="{{ route('customer.profile', ['id' => $customer->id]) }}" class="itemside">
                                        <div class="info pl-3">
                                            <h6 class="mb-0 title">{{ $customer->firstName }} {{ $customer->lastName }}</h6>
                                            <small class="text-muted">Customer ID: #{{ $customer->id }}</small>
                                        </div>
                                    </a>
                                </td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>
                                    @if ($customer->status == 'registerd')
                                        <span class="badge rounded-pill alert-success">Registerd</span>
                                    @else
                                        <span class="badge rounded-pill alert-danger">Not Registerd</span>
                                    @endif
                                </td>
                                <td>{{ $customer->created_at->format('d-m-Y') }}</td>
                                <td class="text-end">
                                    <a href="{{ route('customer.profile', ['id' => $customer->id]) }}"
                                        class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table> <!-- table-responsive.// -->
            </div>
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->

@endsection

@push('customer_filter')
    <script type="text/javascript">
        $('.customer_live_search input').on('keyup', function() {
            let customerName = $('#customer_name').val();
            let customerPhone = $('#customer_phone').val();
            let customerEmail = $('#customer_email').val();

            $.ajax({
                url: "{{ route('customer.filter') }}",
                method: "GET",
                data: {
                    customer_name: customerName,
                    customer_phone: customerPhone, // Corrected parameter name to match the server-side code
                    customer_email: customerEmail // Corrected parameter name to match the server-side code
                },
                success: function(response) {
                    let customerTableBody = $('#CustomerTable');
                    customerTableBody.empty();

                    response.forEach(function(customer) {
                        let row = $('<tr>');

                        // Create the first cell with the customer name and ID link
                        let nameCell = $('<td>').append(
                            $('<a>').attr('href',
                                "{{ route('customer.profile', ['id' => '']) }}" + customer
                                .id).addClass('itemside').append(
                                $('<div>').addClass('info pl-3').append(
                                    $('<h6>').addClass('mb-0 title').text(customer
                                        .firstName + ' ' + customer.lastName),
                                    $('<small>').addClass('text-muted').text(
                                        'Customer ID: #' + customer.id)
                                )
                            )
                        );
                        row.append(nameCell);

                        // Create the phone and email cells
                        row.append($('<td>').text(customer.phone));
                        row.append($('<td>').text(customer.email));

                        // Create the status cell
                        let statusCell = $('<td>');
                        if (customer.status == 'registerd') {
                            statusCell.append($('<span>').addClass(
                                'badge rounded-pill alert-success').text('Registered'));
                        } else {
                            statusCell.append($('<span>').addClass(
                                'badge rounded-pill alert-danger').text(
                                'Not Registered'));
                        }
                        row.append(statusCell);

                        // Format the created_at date
                        let createdAtDate = new Date(customer.created_at);
                        let formattedDate = ("0" + createdAtDate.getDate()).slice(-2) + '-' + (
                                "0" + (createdAtDate.getMonth() + 1)).slice(-2) + '-' +
                            createdAtDate.getFullYear();

                        // Create the created_at cell with formatted date
                        row.append($('<td>').text(formattedDate));

                        // Create the "View details" button cell
                        let detailsCell = $('<td>').addClass('text-end').append(
                            $('<a>').attr('href',
                                "{{ route('customer.profile', ['id' => '']) }}" + customer
                                .id)
                            .addClass('btn btn-sm btn-brand rounded font-sm mt-15').text(
                                'View details')
                        );
                        row.append(detailsCell);

                        // Append the row to the table body
                        customerTableBody.append(row);
                    });
                }

            });
        });
    </script>
@endpush
