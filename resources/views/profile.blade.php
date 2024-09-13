<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
</head>

<body>
    <div class="profile">
        <div class=" profile-avt" style="background-color: bisque">
            <div class="card-avt card-block text-center text-white">
                <div class="" style="margin-top: 6px">
                    @if (isset($customer->customer_image))
                        <img src="{{ asset('images/user/' . $customer->customer_image) }}" class="img-radius"
                            alt="User-Profile-Image" width="200" height="200">
                    @else
                        <img src="{{ asset('images/cus_macdinh.jpg') }}" class="img-radius" alt="Default-Profile-Image"
                            width="200" height="200">
                    @endif
                </div>
                <h6 class="f-w-600" style="font-size: larger; font-family: Arial, sans-serif;">
                    {{ $customer->first_name }}</h6>
                {{-- <p>{{ $customer->address }}</p> --}}
                <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
            </div>
        </div>
        <div class="">
            <div class="card-block" style="padding: 0 250px 0 250px; margin-top: 12px">
                <div class="">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0"><strong>Full Name</strong></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><strong>{{ $customer->first_name }}
                                        {{ $customer->last_name }}</strong></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0"><strong>Email</strong></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $customer->email }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0"><strong>Phone</strong></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $customer->phone }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0"><strong>Adress</strong></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $customer->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="homelogout" class="text-center">
                    <a href="{{ route('updateProfile.edit', $customer->customer_id) }}" id="btn-updateprofile"
                        class="btn btn-primary rounded-pill py-2 px-4 top-0 end-0 me-2" style="margin-top: 7px;">Update
                        Profile</a>
                    <a href="/" id="btn-home" class="btn btn-primary rounded-pill py-2 px-4 top-0 end-0 me-2"
                        style="margin-top: 7px;">Home</a>

                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</html>
