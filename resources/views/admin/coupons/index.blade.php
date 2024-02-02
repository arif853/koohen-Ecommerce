@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div>
        <h2 class="content-title card-title">Coupons List</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{'/dashborad'}}">Dashborad</a></li>
              <li class="breadcrumb-item active" aria-current="page">Coupons</li>
            </ol>
        </nav>
    </div>
    <div>
        <a href="{{route('coupon.create')}}" class="btn btn-primary mt-md-0 mt-2 pull-right">Add New Coupon</a>

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
                        <table class="all-package coupon-table table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        <button type="button" class="btn btn-primary add-row delete_all">Delete</button>
                                    </th>
                                    <th>Title</th>
                                    <th>Code</th>
                                    <th>Discount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-row-id="1">
                                    <td>
                                        <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault" data-id="1">
                                    </td>

                                    <td>10% Off</td>

                                    <td>2143235</td>

                                    <td>10%</td>

                                    <td class="order-warning">
                                        <span>Waiting</span>
                                    </td>
                                </tr>

                                <tr data-row-id="2">
                                    <td>
                                        <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault1" data-id="2">
                                    </td>

                                    <td>25% Off</td>

                                    <td>3243468</td>

                                    <td>20%</td>

                                    <td class="order-success">
                                        <span>Success</span>
                                    </td>
                                </tr>

                                <tr data-row-id="3">
                                    <td>
                                        <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault2" data-id="3">
                                    </td>

                                    <td>16% Off</td>

                                    <td>7846289</td>

                                    <td>30%</td>

                                    <td class="order-warning">
                                        <span>Waiting</span>
                                    </td>
                                </tr>

                                <tr data-row-id="4">
                                    <td>
                                        <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault3" data-id="4">
                                    </td>

                                    <td>12% Off</td>

                                    <td>3614376</td>

                                    <td>15%</td>

                                    <td class="order-pending">
                                        <span>Pending</span>
                                    </td>
                                </tr>

                                <tr data-row-id="5">
                                    <td>
                                        <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault4" data-id="5">
                                    </td>

                                    <td>25% Off</td>

                                    <td>8328192</td>

                                    <td>35%</td>

                                    <td class="order-success">
                                        <span>Success</span>
                                    </td>
                                </tr>

                                <tr data-row-id="6">
                                    <td>
                                        <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault5" data-id="6">
                                    </td>

                                    <td>17% Off</td>

                                    <td>7218376</td>

                                    <td>21%</td>

                                    <td class="order-pending">
                                        <span>Pending</span>
                                    </td>
                                </tr>

                                <tr data-row-id="7">
                                    <td>
                                        <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault6" data-id="7">
                                    </td>

                                    <td>5% Off</td>

                                    <td>1872349</td>

                                    <td>5%</td>

                                    <td class="order-success">
                                        <span>Success</span>
                                    </td>
                                </tr>

                                <tr data-row-id="8">
                                    <td>
                                        <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault7" data-id="8">
                                    </td>

                                    <td>32% Off</td>

                                    <td>5488165</td>

                                    <td>50%</td>

                                    <td class="order-success">
                                        <span>Success</span>
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

@endsection
