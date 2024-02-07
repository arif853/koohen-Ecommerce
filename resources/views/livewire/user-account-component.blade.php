<div class="tab-pane fade profile-header" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab">
    <h2>Account</h2>
    @php
    $user = Auth::guard('customer')->user();
    $fullName = $user->customer->firstName . ' ' . $user->customer->lastName;
    $email = $user->email ;
    $phone = $user->phone ;
    @endphp
    <div class="row">
        <div class="col-lg-6">
            <div class="card  mb-3" >
                <div class="card-header d-flex justify-content-between">
                  <h5 class="card-title">Update your email</h5>
                 </div>
                <div class="card-body text-primary">
                    <form action="{{url('customer/userNameUpdate/'.$user->id)}}" method="POST">
                        @csrf
                        @method('POST')
                        <div>

                            <label for="login_identifier" class="form-label text-dark">Email/Phone Number</label>
                            <input type="text" name="login_identifier" id="login_identifier"  class="form-group" placeholder="Email/Phone Number">

                        </div>
                        <button type="submit" class="btn btn-action">save</button>
                        <p class="text-success mt-4">Your are registered with this email and phone Number.</p>
                        <span class="text-dark mb-2">Email: {{$email}}</span><br>
                        <span class="text-dark mb-4">Phone: {{$phone}}</span>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card  mb-3" >
                <div class="card-header d-flex justify-content-between">
                  <h5 class="card-title">Update your Password</h5>
                 </div>
                <div class="card-body text-primary">
                    <form action="{{url('customer/customerAuth_update/'.$user->id)}}" method="POST">
                        @csrf
                        @method('POST')
                        <div>
                            <label for="old_password" class="form-label text-dark">Old Password</label>
                            <input type="password" name="old_password" id="old_password" value="" class="form-group" placeholder="Old Password">
                            @error('old_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="form-label text-dark">New Password <small class="text-danger">(Please use a strong password.)</small></label>
                            <input type="password" name="password" id="password" value="" class="form-group" placeholder="New Password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="c_password" class="form-label text-dark">Confirm Password</label>
                            <input type="password" name="c_password" id="c_password" value="" class="form-group" placeholder="Confirm Password" required oninput="validateMatching()">
                            <span id="passwordMatchMessage" class=""></span>
                            @error('c_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-action">save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
