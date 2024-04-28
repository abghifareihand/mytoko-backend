@extends('layouts.app')

@section('title', 'Profile')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Profile</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    Profile
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="{{ asset('assets/images/backgrounds/chatbc.png') }}" class="img-fluid mb-n4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card w-100 position-relative overflow-hidden">
            <!-- Title -->
            <div class="px-4 py-3 border-bottom d-flex align-items-center">
                <h5 class="card-title fw-semibold mb-0 lh-sm">My Account</h5>

            </div>
            <!-- Tables -->
            <div class="card-body p-4">
                <div class="row">
                    <!-- Change Profile -->
                    <div class="col-lg-6 d-flex align-items-stretch">
                        <div class="card w-100 position-relative overflow-hidden">
                            <div class="card-body p-4">
                                <h5 class="card-title fw-semibold">Change Profile</h5>
                                <p class="card-subtitle mb-4">Change your profile picture from here</p>
                                <form action="#" method="post">
                                    <div class="text-center">
                                        <img src="../assets/images/profile/user-1.jpg"
                                            class="img-fluid rounded-circle img-previewx" width="120" height="120">
                                        <div class="d-flex align-items-center justify-content-center my-4 gap-6">
                                            <label for="inputImage" class="btn btn-primary">Upload</label>
                                            <a href="../html/authentication-profile.html"
                                                class="btn bg-danger-subtle text-danger">Reset</a>
                                        </div>
                                        <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 2MB</p>
                                    </div>
                                    <input type="file" id="inputImage" name="image_url" onchange="previewImage()" hidden>
                                    <div>
                                        <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
                                            <button class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Change Password -->
                    <div class="col-lg-6 d-flex align-items-stretch">
                        <div class="card w-100 position-relative overflow-hidden">
                            <div class="card-body p-4">
                                <h5 class="card-title fw-semibold">Change Password</h5>
                                <p class="card-subtitle mb-4">To change your password please confirm here</p>
                                <form action="#" method="post">
                                    <input type="hidden" name="_token" value="tokenmungkin" autocomplete="off">
                                    <div class="mb-3">
                                        <label for="current_password" class="form-label">Current
                                            Password</label>
                                        <input type="password" name="current_password" class="form-control"
                                            id="current_password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">New Password</label>
                                        <input type="password" name="password" class="form-control" id="new_password">
                                    </div>
                                    <div>
                                        <label for="exampleInputPassword3" class="form-label">Confirm
                                            Password</label>
                                        <input type="password" class="form-control" id="password">
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
                                            <button class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Personal Details -->
                    <div class="col-12">
                        <div class="card w-100 position-relative overflow-hidden mb-0">
                            <div class="card-body p-4">
                                <h5 class="card-title fw-semibold">Personal Details</h5>
                                <p class="card-subtitle mb-4">To change your personal detail , edit and save
                                    from here</p>
                                <form action="#" method="post">
                                    <input type="hidden" name="_token" value="tokenmungkin" autocomplete="off">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    placeholder="Name" value="{{ auth()->user()->name }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="phone_number" class="form-label">Phone</label>
                                                <input type="number" name="phone_number" class="form-control"
                                                    id="phone_number" placeholder="08123XXXXX"
                                                    value="{{ auth()->user()->phone }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" id="email"
                                                    placeholder="example@gmail.com" value="{{ auth()->user()->email }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="role" class="form-label">Role</label>
                                                <input type="text" name="role" class="form-control" id="role"
                                                    placeholder="Role" value="{{ auth()->user()->role }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
                                            <button class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
