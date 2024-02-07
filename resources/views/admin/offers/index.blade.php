@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div>
        <h2 class="content-title card-title">Offers List</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{'/dashborad'}}">Dashborad</a></li>
              <li class="breadcrumb-item active" aria-current="page">offers</li>
            </ol>
        </nav>
    </div>
    <div>
        {{-- <a href="#" class="btn btn-primary btn-sm rounded">Add New category</a> --}}
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm rounded" data-bs-toggle="modal" data-bs-target="#typeModal">
            Add offer Type
        </button>
        <button type="button" class="btn btn-primary btn-sm rounded" data-bs-toggle="modal" data-bs-target="#offerModal">
            Add New Offer
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
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <figure class="card border-1">
                            <div class="brand-overlay">
                                <div class="action-icon">
                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#categorymodify"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="#" onclick="confirmDelete()" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa-regular fa-trash-can"></i></a>
                                    <form action="#" method="post" id="deleteForm"></form>
                                </div>
                            </div>
                            <div class="card-header bg-white text-center">
                                <img height="76" src="{{asset('')}}admin/assets/imgs/brands/brand-1.jpg" class="img-fluid" alt="Logo">
                            </div>
                            <figcaption class="card-body text-center">
                                <h6 class="card-title m-0">Cardinal</h6>
                                <a href="#"> 398 items </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <figure class="card border-1">
                            <div class="brand-overlay">
                                <div class="action-icon">
                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#categorymodify"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="#" onclick="confirmDelete()" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa-regular fa-trash-can"></i></a>
                                </div>
                            </div>
                            <div class="card-header bg-white text-center">
                                <img height="76" src="{{asset('')}}admin/assets/imgs/brands/brand-2.jpg" class="img-fluid" alt="Logo">
                            </div>
                            <figcaption class="card-body text-center">
                                <h6 class="card-title m-0">BirdFly</h6>
                                <a href="#"> 13 items </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <figure class="card border-1">
                            <div class="brand-overlay">
                                <div class="action-icon">
                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#categorymodify"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="#" onclick="confirmDelete()" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa-regular fa-trash-can"></i></a>
                                </div>
                            </div>
                            <div class="card-header bg-white text-center">
                                <img height="76" src="{{asset('')}}admin/assets/imgs/brands/brand-3.jpg" class="img-fluid" alt="Logo">
                            </div>
                            <figcaption class="card-body text-center">
                                <h6 class="card-title m-0">Cocorico</h6>
                                <a href="#"> 13 items </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <figure class="card border-1">
                            <div class="brand-overlay">
                                <div class="action-icon">
                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#categorymodify"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="#" onclick="confirmDelete()" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa-regular fa-trash-can"></i></a>
                                </div>
                            </div>
                            <div class="card-header bg-white text-center">
                                <img height="76" src="{{asset('')}}admin/assets/imgs/brands/brand-4.jpg" class="img-fluid" alt="Logo">
                            </div>
                            <figcaption class="card-body text-center">
                                <h6 class="card-title m-0">Yogilist</h6>
                                <a href="#"> 87 items </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <figure class="card border-1">
                            <div class="brand-overlay">
                                <div class="action-icon">
                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#categorymodify"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="#" onclick="confirmDelete()" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa-regular fa-trash-can"></i></a>
                                </div>
                            </div>
                            <div class="card-header bg-white text-center">
                                <img height="76" src="{{asset('')}}admin/assets/imgs/brands/brand-5.jpg" class="img-fluid" alt="Logo">
                            </div>
                            <figcaption class="card-body text-center">
                                <h6 class="card-title m-0">Acerie</h6>
                                <a href="#"> 10 items </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <figure class="card border-1">
                            <div class="brand-overlay">
                                <div class="action-icon">
                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#categorymodify"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="#" onclick="confirmDelete()" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa-regular fa-trash-can"></i></a>
                                </div>
                            </div>
                            <div class="card-header bg-white text-center">
                                <img height="76" src="{{asset('')}}admin/assets/imgs/brands/brand-6.jpg" class="img-fluid" alt="Logo">
                            </div>
                            <figcaption class="card-body text-center">
                                <h6 class="card-title m-0">Shivakin</h6>
                                <a href="#"> 398 items </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <figure class="card border-1">
                            <div class="brand-overlay">
                                <div class="action-icon">
                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#categorymodify"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="#" onclick="confirmDelete()" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa-regular fa-trash-can"></i></a>
                                </div>
                            </div>
                            <div class="card-header bg-white text-center">
                                <img height="76" src="{{asset('')}}admin/assets/imgs/brands/brand-7.jpg" class="img-fluid" alt="Logo">
                            </div>
                            <figcaption class="card-body text-center">
                                <h6 class="card-title m-0">Acera</h6>
                                <a href="#"> 398 items </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <figure class="card border-1">
                            <div class="brand-overlay">
                                <div class="action-icon">
                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#categorymodify"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="#" onclick="confirmDelete()" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa-regular fa-trash-can"></i></a>
                                </div>
                            </div>
                            <div class="card-header bg-white text-center">
                                <img height="76" src="{{asset('')}}admin/assets/imgs/brands/brand-8.jpg" class="img-fluid" alt="Logo">
                            </div>
                            <figcaption class="card-body text-center">
                                <h6 class="card-title m-0">Lion electronics</h6>
                                <a href="#"> 398 items </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <figure class="card border-1">
                            <div class="brand-overlay">
                                <div class="action-icon">
                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#categorymodify"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="#" onclick="confirmDelete()" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa-regular fa-trash-can"></i></a>
                                </div>
                            </div>
                            <div class="card-header bg-white text-center">
                                <img height="76" src="{{asset('')}}admin/assets/imgs/brands/brand-9.jpg" class="img-fluid" alt="Logo">
                            </div>
                            <figcaption class="card-body text-center">
                                <h6 class="card-title m-0">TwoHand</h6>
                                <a href="#"> 398 items </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <figure class="card border-1">
                            <div class="brand-overlay">
                                <div class="action-icon">
                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#categorymodify"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="#" onclick="confirmDelete()" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa-regular fa-trash-can"></i></a>
                                </div>
                            </div>
                            <div class="card-header bg-white text-center">
                                <img height="76" src="{{asset('')}}admin/assets/imgs/brands/brand-10.jpg" class="img-fluid" alt="Logo">
                            </div>
                            <figcaption class="card-body text-center">
                                <h6 class="card-title m-0">Kiaomin</h6>
                                <a href="#"> 398 items </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <figure class="card border-1">
                            <div class="brand-overlay">
                                <div class="action-icon">
                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#categorymodify"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="#" onclick="confirmDelete()" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa-regular fa-trash-can"></i></a>
                                </div>
                            </div>
                            <div class="card-header bg-white text-center">
                                <img height="76" src="{{asset('')}}admin/assets/imgs/brands/brand-11.jpg" class="img-fluid" alt="Logo">
                            </div>
                            <figcaption class="card-body text-center">
                                <h6 class="card-title m-0">Nokine</h6>
                                <a href="#"> 398 items </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <figure class="card border-1">
                            <div class="brand-overlay">
                                <div class="action-icon">
                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#categorymodify"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="#" onclick="confirmDelete()" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa-regular fa-trash-can"></i></a>
                                </div>
                            </div>
                            <div class="card-header bg-white text-center">
                                <img height="76" src="{{asset('')}}admin/assets/imgs/brands/brand-12.jpg" class="img-fluid" alt="Logo">
                            </div>
                            <figcaption class="card-body text-center">
                                <h6 class="card-title m-0">Company name</h6>
                                <a href="#"> 13 items </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <figure class="card border-1">
                            <div class="brand-overlay">
                                <div class="action-icon">
                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#categorymodify"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="#" onclick="confirmDelete()" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa-regular fa-trash-can"></i></a>
                                </div>
                            </div>
                            <div class="card-header bg-white text-center">
                                <img height="76" src="{{asset('')}}admin/assets/imgs/brands/brand-13.jpg" class="img-fluid" alt="Logo">
                            </div>
                            <figcaption class="card-body text-center">
                                <h6 class="card-title m-0">Company name</h6>
                                <a href="#"> 398 items </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <figure class="card border-1">
                            <div class="brand-overlay">
                                <div class="action-icon">
                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#categorymodify"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="#" onclick="confirmDelete()" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa-regular fa-trash-can"></i></a>
                                </div>
                            </div>
                            <div class="card-header bg-white text-center">
                                <img height="76" src="{{asset('')}}admin/assets/imgs/brands/brand-14.jpg" class="img-fluid" alt="Logo">
                            </div>
                            <figcaption class="card-body text-center">
                                <h6 class="card-title m-0">Company name</h6>
                                <a href="#"> 13 items </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <figure class="card border-1">
                            <div class="brand-overlay">
                                <div class="action-icon">
                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#categorymodify"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="#" onclick="confirmDelete()" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa-regular fa-trash-can"></i></a>
                                </div>
                            </div>
                            <div class="card-header bg-white text-center">
                                <img height="76" src="{{asset('')}}admin/assets/imgs/brands/brand-15.jpg" class="img-fluid" alt="Logo">
                            </div>
                            <figcaption class="card-body text-center">
                                <h6 class="card-title m-0">Company name</h6>
                                <a href="#"> 398 items </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <figure class="card border-1">
                            <div class="brand-overlay">
                                <div class="action-icon">
                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#categorymodify"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="#" onclick="confirmDelete()" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa-regular fa-trash-can"></i></a>
                                </div>
                            </div>
                            <div class="card-header bg-white text-center">
                                <img height="76" src="{{asset('')}}admin/assets/imgs/brands/brand-16.jpg" class="img-fluid" alt="Logo">
                            </div>
                            <figcaption class="card-body text-center">
                                <h6 class="card-title m-0">Company name</h6>
                                <a href="#"> 13 items </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <figure class="card border-1">
                            <div class="brand-overlay">
                                <div class="action-icon">
                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#categorymodify"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="#" onclick="confirmDelete()" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa-regular fa-trash-can"></i></a>
                                </div>
                            </div>
                            <div class="card-header bg-white text-center">
                                <img height="76" src="{{asset('')}}admin/assets/imgs/brands/brand-17.jpg" class="img-fluid" alt="Logo">
                            </div>
                            <figcaption class="card-body text-center">
                                <h6 class="card-title m-0">Company name</h6>
                                <a href="#"> 13 items </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <figure class="card border-1">
                            <div class="brand-overlay">
                                <div class="action-icon">
                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#categorymodify"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="#" onclick="confirmDelete()" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa-regular fa-trash-can"></i></a>
                                </div>
                            </div>
                            <div class="card-header bg-white text-center">
                                <img height="76" src="{{asset('')}}admin/assets/imgs/brands/brand-18.jpg" class="img-fluid" alt="Logo">
                            </div>
                            <figcaption class="card-body text-center">
                                <h6 class="card-title m-0">Company name</h6>
                                <a href="#"> 13 items </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                </div> <!-- row.// -->
            </div> <!-- card-body end// -->
        </div> <!-- card end// -->
    </div>
</div>

@include('admin.offers.create_offer')
@include('admin.offers.offer_type')

@endsection

