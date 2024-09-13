<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Profile</title>
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
                <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
            </div>
        </div>
        <div class="">
            <div class="card-block" style="padding: 0 250px 0 250px; margin-top: 12px">
                <div class="">
                    <div class="card-body">
                        <form action="{{ route('updateProfile.update', $customer->customer_id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="first_name" id="first_name"
                                        value="{{ $customer->first_name }}" class="form-control">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" id="last_name" name="last_name"
                                        value="{{ $customer->last_name }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input required type="email" class="form-control" id="email" name="email"
                                        value="{{ $customer->email }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input required type="number" class="form-control" id="phone" name="phone"
                                        value="{{ $customer->phone }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" id="address" name="address"
                                        value="{{ $customer->address }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="customer_image" class="col-sm-3 col-form-label">Customer Image</label>
                                <div class="col-sm-9">
                                    <input accept="image/*" type="file" name="customer_image" id="customer_image"
                                        class="form-control-file">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

</html>
