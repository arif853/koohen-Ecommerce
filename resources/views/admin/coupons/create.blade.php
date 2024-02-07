@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div>
        <h2 class="content-title card-title">Create New Coupon</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{'/dashborad'}}">Dashborad</a></li>
              <li class="breadcrumb-item active" aria-current="page">New Coupon</li>
            </ol>
        </nav>
    </div>
    <div class="pull-right">
        <a href="javascript:history.back()"><i class="material-icons md-arrow_back "></i> Go back </a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
      <div class="card tab2-card">

        <div class="card-body">
            <ul class="nav nav-pills nav-tabs tab-coupon mb-3" id="pills-tab" role="tablist">
                <li class="nav-item " role="presentation">
                    <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" href="#primarytab-1">General</a>
                  {{-- <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button> --}}
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" role="tab" aria-controls="pills-home" aria-selected="true" href="#primarytab-2">Restriction</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" role="tab" aria-controls="pills-home" aria-selected="true" href="#primarytab-3">Usage</a>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="tab_title">
                    <h4>General</h4>
                </div>
                <form class="needs-validation" novalidate="">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group row mb-4">
                                <label for="validationCustom0" class="col-xl-3 col-md-4"><span class="text-danger">*</span>
                                    Coupan Title</label>
                                <div class="col-md-7">
                                    <input class="form-control" id="validationCustom0" type="text" required="" placeholder="Type here...">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span class="text-danger">*</span>Coupan Code</label>
                                <div class="col-md-7">
                                    <input class="form-control" id="validationCustom1" type="text" required="" placeholder="Type here...">
                                </div>
                                <div class="valid-feedback">Please Provide a Valid Coupon Code.
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-xl-3 col-md-4">Start Date</label>
                                <div class="col-md-7">
                                    <input class="datetimepicker form-control" type="text" data-language="en" placeholder="Type here...">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-xl-3 col-md-4">End Date</label>
                                <div class="col-md-7">
                                    <input class="datetimepicker form-control digits" type="text" data-language="en" placeholder="Type here...">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-xl-3 col-md-4">Free Shipping</label>
                                <div class="col-md-7">
                                    <div class="checkbox checkbox-primary">
                                        <input id="checkbox-primary-1" type="checkbox" data-original-title="" title="" >
                                        <label for="checkbox-primary-1">Allow Free Shipping</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-xl-3 col-md-4">Quantity</label>
                                <div class="col-md-7">
                                    <input class="form-control" type="number" required="" placeholder="Type here...">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-xl-3 col-md-4">Discount Type</label>
                                <div class="col-md-7">
                                    <select class="custom-select w-100 form-control" required="">
                                        <option value="">--Select--</option>
                                        <option value="1">Percent</option>
                                        <option value="2">Fixed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-xl-3 col-md-4">Status</label>
                                <div class="col-md-7">
                                    <div class="checkbox checkbox-primary">
                                        <input id="checkbox-primary-2" type="checkbox" data-original-title="" title="">
                                        <label for="checkbox-primary-2">Enable the Coupon</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pull-right">
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="tab_title">
                    <h4>Restriction</h4>
                </div>
                <form class="needs-validation" novalidate="">
                    <div class="form-group row mb-4">
                        <label for="validationCustom3" class="col-xl-3 col-md-4">Products</label>
                        <div class="col-md-7">
                            <select class="custom-select w-100 select-nice" required="">
                                <option value="">--Select--</option>
                                <option value="1">Electronics</option>
                                <option value="2">Clothes</option>
                                <option value="2">Shoes</option>
                                <option value="2">Digital</option>
                            </select>
                        </div>
                        <div class="valid-feedback">Please Provide a Product Name.</div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-xl-3 col-md-4">Category</label>
                        <div class="col-md-7">
                            <select class="custom-select w-100 form-control" required="">
                                <option value="">--Select--</option>
                                <option value="1">Electronics</option>
                                <option value="2">Clothes</option>
                                <option value="2">Shoes</option>
                                <option value="2">Digital</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="validationCustom4" class="col-xl-3 col-md-4">Minimum
                            Spend</label>
                        <div class="col-md-7">
                            <input class="form-control" id="validationCustom4" type="number">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="validationCustom5" class="col-xl-3 col-md-4">Maximum
                            Spend</label>
                        <div class="col-md-7">
                            <input class="form-control" id="validationCustom5" type="number">
                        </div>
                    </div>
                    <div class="pull-right">
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="tab_title">
                    <h4>Usage Limits</h4>
                </div>
                <form class="needs-validation" novalidate="">
                    <div class="form-group row mb-4">
                        <label for="validationCustom6" class="col-xl-3 col-md-4">Per Limit</label>
                        <div class="col-md-7">
                            <input class="form-control" id="validationCustom6" type="number">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="validationCustom7" class="col-xl-3 col-md-4">Per
                            Customer</label>
                        <div class="col-md-7">
                            <input class="form-control" id="validationCustom7" type="number">
                        </div>
                    </div>
                    <div class="pull-right">
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            </div>

        </div>
      </div>
    </div>

</div>
@endsection
