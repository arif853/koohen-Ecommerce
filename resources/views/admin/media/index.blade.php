@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
              <form class="dropzone needsclick" id="demo-upload" action="/upload">
                <div class="dz-message needsclick">
                  <div class="upload-icon"><i class="fa fa-cloud-upload"></i></div>
                  <h3>Drop files here or click to upload.</h3>
                  <p>(This is just a demo dropzone. Selected files are<strong>
                      not actually uploaded.)</strong></p>
                </div>
              </form>
              <div class="preview-dropzon" style="display: none;">
                <div class="dz-preview dz-file-preview">
                  <div class="dz-image"><img data-dz-thumbnail="" src="" alt=""></div>
                  <div class="dz-details">
                    <div class="dz-size"><span data-dz-size=""></span></div>
                    <div class="dz-filename"><span data-dz-name=""></span></div>
                  </div>
                  <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress="">                    </span></div>
                  <div class="dz-success-mark"><i class="fa fa-check" aria-hidden="true"></i></div>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <form class="form-inline search-form search-box pull-right">
                    <div class="form-group">
                        <input class="form-control-plaintext" type="search" placeholder="Search.."><span class="d-sm-none mobile-search"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></span>
                    </div>
                </form>
            </div>

            <div class="card-body">
                <div class="table-responsive table-desi">
                    <table class="all-package coupon-table table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    <button type="button" class="btn btn-primary add-row delete_all">Delete</button>
                                </th>
                                <th>Image</th>
                                <th>File Name</th>
                                <th>URL</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr data-row-id="1">
                                <td>
                                    <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault" data-id="1">
                                </td>

                                <td>
                                    <img src="assets/images/dashboard/product/1.jpg" alt="user">
                                </td>

                                <td>Honor_Mobile.jpg</td>

                                <td>http://www.assets/images/dashboard/product/1.jpg</td>
                            </tr>

                            <tr data-row-id="2">
                                <td>
                                    <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault1" data-id="2">
                                </td>

                                <td>
                                    <img src="assets/images/dashboard/product/2.jpg" alt="user">
                                </td>

                                <td>Samsung_LED_TV.jpeg</td>

                                <td>http://www.assets/images/dashboard/product/2.jpg</td>
                            </tr>

                            <tr data-row-id="3">
                                <td>
                                    <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault2" data-id="3">
                                </td>

                                <td>
                                    <img src="assets/images/dashboard/product/3.jpg" alt="user">
                                </td>

                                <td>Motorola_Bluetooth.jpg</td>

                                <td>http://www.assets/images/dashboard/product/3.jpg</td>
                            </tr>

                            <tr data-row-id="4">
                                <td>
                                    <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault3" data-id="4">
                                </td>

                                <td>
                                    <img src="assets/images/dashboard/product/4.jpg" alt="user">
                                </td>

                                <td>headphones.jpg</td>

                                <td>http://www.assets/images/dashboard/product/4.jpg"</td>
                            </tr>

                            <tr data-row-id="5">
                                <td>
                                    <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault4" data-id="5">
                                </td>

                                <td>
                                    <img src="assets/images/dashboard/product/5.jpg" alt="user">
                                </td>

                                <td>Apple_6s.jpeg</td>

                                <td>http://www.assets/images/dashboard/product/5.jpg"</td>
                            </tr>

                            <tr data-row-id="6">
                                <td>
                                    <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault5" data-id="6">
                                </td>

                                <td>
                                    <img src="assets/images/dashboard/product/6.jpg" alt="user">
                                </td>

                                <td>Apple_6s.jpeg</td>

                                <td>http://www.assets/images/dashboard/product/6.jpg"</td>
                            </tr>

                            <tr data-row-id="7">
                                <td>
                                    <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault6" data-id="7">
                                </td>

                                <td>
                                    <img src="assets/images/dashboard/product/7.jpg" alt="user">
                                </td>

                                <td>Canon_Camera.jpg</td>

                                <td>http://www.assets/images/dashboard/product/7.jpg"</td>
                            </tr>

                            <tr data-row-id="8">
                                <td>
                                    <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault7" data-id="8">
                                </td>

                                <td>
                                    <img src="assets/images/dashboard/product/8.jpg" alt="user">
                                </td>

                                <td>High_Quality_Headphones.jpg</td>

                                <td>http://www.assets/images/dashboard/product/8.jpg"</td>
                            </tr>

                            <tr data-row-id="9">
                                <td>
                                    <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault8" data-id="9">
                                </td>

                                <td>
                                    <img src="assets/images/dashboard/product/9.jpg" alt="user">
                                </td>

                                <td>Home_Theater_Speakers.jpg</td>

                                <td>http://www.assets/images/dashboard/product/9.jpg"</td>
                            </tr>

                            <tr data-row-id="10">
                                <td>
                                    <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault9" data-id="10">
                                </td>

                                <td>
                                    <img src="assets/images/dashboard/product/10.jpg" alt="user">
                                </td>

                                <td>Diamond_Ring.jpg</td>

                                <td>http://www.assets/images/dashboard/product/10.jpg</td>
                            </tr>

                            <tr data-row-id="11">
                                <td>
                                    <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault10" data-id="11">
                                </td>

                                <td>
                                    <img src="assets/images/dashboard/product/11.jpg" alt="user">
                                </td>

                                <td>Diamond_Nacklace.jpeg</td>

                                <td>http://www.assets/images/dashboard/product/11.jpg</td>
                            </tr>

                            <tr data-row-id="12">
                                <td>
                                    <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault11" data-id="12">
                                </td>

                                <td>
                                    <img src="assets/images/dashboard/product/12.jpg" alt="user">
                                </td>

                                <td>Diamond_Earrings.jpeg</td>

                                <td>http://www.assets/images/dashboard/product/12.jpg</td>
                            </tr>

                            <tr data-row-id="13">
                                <td>
                                    <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault12" data-id="13">
                                </td>

                                <td>
                                    <img src="assets/images/dashboard/product/13.jpg" alt="user">
                                </td>

                                <td>Night_lamp.jpg</td>

                                <td>http://www.assets/images/dashboard/product/13.jpg</td>
                            </tr>

                            <tr data-row-id="14">
                                <td>
                                    <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault13" data-id="14">
                                </td>

                                <td>
                                    <img src="assets/images/dashboard/product/14.jpg" alt="user">
                                </td>

                                <td>men's_shoes.jpg</td>

                                <td>http://www.assets/images/dashboard/product/14.jpg</td>
                            </tr>

                            <tr data-row-id="15">
                                <td>
                                    <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault14" data-id="15">
                                </td>

                                <td>
                                    <img src="assets/images/dashboard/product/15.jpg" alt="user">
                                </td>

                                <td>Ledi's_red_top.jpeg</td>

                                <td>http://www.assets/images/dashboard/product/15.jpg</td>
                            </tr>

                            <tr data-row-id="16">
                                <td>
                                    <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault15" data-id="16">
                                </td>

                                <td>
                                    <img src="assets/images/dashboard/product/16.jpg" alt="user">
                                </td>

                                <td>latest_ledis_shoes.jpg</td>

                                <td>http://www.assets/images/dashboard/product/16.jpg</td>
                            </tr>

                            <tr data-row-id="17">
                                <td>
                                    <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault16" data-id="17">
                                </td>

                                <td>
                                    <img src="assets/images/dashboard/product/17.jpg" alt="user">
                                </td>

                                <td>Apple_6s.jpeg</td>

                                <td>http://www.assets/images/dashboard/product/17.jpg</td>
                            </tr>

                            <tr data-row-id="18">
                                <td>
                                    <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault17" data-id="18">
                                </td>

                                <td>
                                    <img src="assets/images/dashboard/product/18.jpg" alt="user">
                                </td>

                                <td>Printer.jpg</td>

                                <td>http://www.assets/images/dashboard/product/18.jpg</td>
                            </tr>

                            <tr data-row-id="19">
                                <td>
                                    <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault18" data-id="19">
                                </td>

                                <td>
                                    <img src="assets/images/dashboard/product/19.jpg" alt="user">
                                </td>

                                <td>High_Quality_Headphones.jpg</td>

                                <td>http://www.assets/images/dashboard/product/19.jpg</td>
                            </tr>

                            <tr data-row-id="20">
                                <td>
                                    <input class="checkbox_animated check-it" type="checkbox" value="" id="flexCheckDefault19" data-id="20">
                                </td>

                                <td>
                                    <img src="assets/images/dashboard/product/20.jpg" alt="user">
                                </td>

                                <td>Motorola_Bluetooth.jpg</td>

                                <td>http://www.assets/images/dashboard/product/20.jpg</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
