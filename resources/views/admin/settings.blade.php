@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div>
        <h2 class="content-title card-title">Website Settings</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{'/dashborad'}}">Dashborad</a></li>
              <li class="breadcrumb-item active" aria-current="page">Settings</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
            </div>

            <div class="card-body">
                <form action="{{route('settings.update')}}" method="POST">
                    @csrf
                    @method('POST')
                        <div class="row g-3">
                            <div class="col-md-12 mb-2">
                                <label for="primary_mobile_no" class="form-label">Primary Mobile Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="primary_mobile_no" name="primary_mobile_no" placeholder="Primary Mobile Number"  value="{{ $settings->primary_mobile_no }}">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="secondary_mobile_no" class="form-label">Secondary Mobile Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="secondary_mobile_no" name="secondary_mobile_no" placeholder="Secondary Mobile Number"  value="{{ $settings->secondary_mobile_no }}">
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="whatsapp_url" class="form-label">Whatsapp URL</label>
                                <input type="text" class="form-control" id="whatsapp_url" name="whatsapp_url" placeholder="Whatsapp Link URL"  value="{{ $settings->whatsapp_url }}">
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="facebook_url" class="form-label">Facebook URL</label>
                                <input type="text" class="form-control" id="facebook_url" name="facebook_url" placeholder=" Facebook Link URL"  value="{{ $settings->facebook_url }}">
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="twiter_url" class="form-label">Twitter URL</label>
                                <input type="text" class="form-control" id="twiter_url" name="twiter_url" placeholder=" Twitter Link URL"  value="{{ $settings->twiter_url }}">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="instagram_url" class="form-label">Instragram URL</label>
                                <input type="text" class="form-control" id="instagram_url" name="instagram_url" placeholder=" Instagram Link URL"  value="{{ $settings->instagram_url }}">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="youtube_url" class="form-label">Youtube URL</label>
                                <input type="text" class="form-control" id="youtube_url" name="youtube_url" placeholder=" Youtube Link URL"  value="{{ $settings->youtube_url }}">
                            </div>

                            <div class="col-md-12 mb-2">
                              <label for="slider_image" class="form-label">Email<span class="text-danger">*</span></label>
                              <input type="email" class="form-control" id="email" name="email"  value="{{ $settings->email }}">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="slider_image" class="form-label">Company Address<span class="text-danger">*</span></label>
                                <textarea class="form-control" id="company_address" name="company_address">{{ $settings->company_address  }}</textarea>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="company_short_details" class="form-label">Company Details<span class="text-danger">*</span></label>
                                <textarea class="form-control" id="company_short_details" name="company_short_details">{{ $settings->company_short_details  }}</textarea>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Save</button>

                            </div>
                        </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
