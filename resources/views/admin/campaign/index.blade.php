
@extends('layouts.admin')
@section('title','Campaign')
@section('content')
<div class="content-header">
    <a href="javascript:history.back()"><i class="material-icons md-arrow_back"></i> Go back </a>
</div>
<<<<<<< HEAD
<h2>It is not the man who has too little, but the man who craves more, that is poor. - Seneca</h2>
=======
>>>>>>> 71d6d2e3987b20dd12848d8991cc00ea1bbbd091

<div>
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Manage Campaign</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{'/dashborad'}}">Dashborad</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Campaign</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{route('campaign.create')}}" class="btn btn-primary mt-md-0 mt-2 pull-right">New Campaign</a>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
<<<<<<< HEAD
                <div class="card-header">
=======
                {{-- <div class="card-header">
>>>>>>> 71d6d2e3987b20dd12848d8991cc00ea1bbbd091
                    <form class="form-inline search-form search-box pull-right">
                        <div class="form-group">
                            <input class="form-control-plaintext" type="search" placeholder="Search..">
                        </div>
                    </form>

<<<<<<< HEAD
                </div>

                <div class="card-body">
                    <div>
                        <div class="table-responsive table-desi">
                            <table class="all-package coupon-table table table-striped" id="datatable">
                                <thead>
                                    <tr>
                                        <th>
                                            <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault" data-id="1">
                                        </th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
=======
                </div> --}}
                <style>
                    .table tr td{
                        vertical-align: middle;
                    }
                </style>
                <div class="card-body">
                    <div>
                        <div class="table-responsive table-desi">
                            <table class="table table-striped" id="datatable">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault" data-id="1">
                                        </th>
                                        <th width=5%>ID</th>
                                        <th>Name</th>
                                        <th >Image</th>
>>>>>>> 71d6d2e3987b20dd12848d8991cc00ea1bbbd091
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
<<<<<<< HEAD
                                    <tr >
                                        <td>
                                            <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault" data-id="1">
                                        </td>
                                        <td>1</td>
                                        <td>10% Off</td>

                                        <td>2143235</td>

                                        <td>10%</td>

                                        <td class="order-warning">
                                            <span>Waiting</span>
                                        </td>
                                    </tr>

=======
                                    @foreach ($campaigns as $key => $campaign)
                                    <tr >
                                        <td class="text-center">
                                            <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault" data-id="1">
                                        </td>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$campaign->camp_name}}</td>

                                        <td><img src="{{asset('storage/'.$campaign->image)}}" alt="{{$campaign->camp_name}}" width="150"></td>

                                        <td>
                                            @if ($campaign->status == 'Published')
                                            <span class="badge rounded-pill alert-success">{{$campaign->status}}</span>
                                            @else
                                            <span class="badge rounded-pill alert-danger">{{$campaign->status}}</span>
                                            @endif
                                        </td>

                                        <td class="order-warning">
                                            <form class="deleteForm" action="{{ route('campaign.destroy', $campaign->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('campaign.edit', ['id' => $campaign->id])}}"  class="btn btn-sm font-sm rounded btn-brand">
                                                    <i class="material-icons md-edit"></i> Edit
                                                </a>
                                                <a href="#" class="btn btn-danger btn-sm font-sm  rounded delete">
                                                    <i class="material-icons md-delete_forever"></i> Delete
                                                </a>
                                                <a href="#" class="btn btn-info btn-sm font-sm  rounded view ml-2">
                                                    <i class="material-icons md-visibility"></i>
                                                    view
                                                </a>
                                            </form>
                                        </td>
                                    </tr>

                                    @endforeach

>>>>>>> 71d6d2e3987b20dd12848d8991cc00ea1bbbd091

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<<<<<<< HEAD
@endsection
=======
<h6>It is not the man who has too little, but the man who craves more, that is poor. - Seneca</h6>

@endsection
@push('product')
<script>
     document.querySelectorAll('.delete').forEach(function (element) {
        element.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent the default link behavior

            var form = this.closest('form');

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
>>>>>>> 71d6d2e3987b20dd12848d8991cc00ea1bbbd091
