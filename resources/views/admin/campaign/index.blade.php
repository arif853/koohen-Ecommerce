
@extends('layouts.admin')
@section('title','Campaign')
@section('content')
<div class="content-header">
    <a href="javascript:history.back()"><i class="material-icons md-arrow_back"></i> Go back </a>
</div>
<h2>It is not the man who has too little, but the man who craves more, that is poor. - Seneca</h2>

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
                <div class="card-header">
                    <form class="form-inline search-form search-box pull-right">
                        <div class="form-group">
                            <input class="form-control-plaintext" type="search" placeholder="Search..">
                        </div>
                    </form>

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
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
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


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
