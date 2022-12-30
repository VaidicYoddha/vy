@extends('master')

{{-- @section('url')
{{ env('APP_URL') }}

@endsection --}}

@section('title')


@endsection

@section('content')

<div id="user-profile">
    <!-- profile header -->
    <div class="row">
        <div class="col-12">
            <div class="card profile-header mb-2">
                <!-- profile cover photo -->
                {{-- <img
          class="card-img-top"
          src="{{ asset('/storage')}}/logo/vy3.png"
                alt="User Profile Image" height="250px"
                /> --}}
                <!--/ profile cover photo -->

                <div class="position-relative">
                    <!-- profile picture -->
                    <div class="profile-img-container d-flex align-items-center">
                        <div class="profile-img">
                            <img src="https://ui-avatars.com/api/?name={{Auth::user()->name}}&color=ff0000&bold=true"
                                alt="avatar" class="rounded img-fluid" alt="Card image" />
                        </div>
                        <!-- profile title -->
                        <div class="profile-title ms-3">
                            <h2 class="text-dark fw-bolder">{{Auth::user()->name}}</h2>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!--/ profile header -->





                        <!-- center profile info section -->
                        <div class="col-lg-12 col-12">
                            <!-- post 1 -->
                            <div class="card">
                                <div class="card-body">

                                    <div class="col-xl-6">
                                        <div class="card">
                                            <div class="card-body">
                                                  @if(Session::has('success'))
                                                    <p class="alert alert-success">
                                                        {{ session('success') }}
                                                    </p>
                                                @endif
                                                <h4 class="card-title mb-3">Profile Information</h4>

                                                <form action="{{ url('profile-update')}}" method="POST" enctype="multipart/form-data"
                                                       class="needs-validation" novalidate>
                                                 @csrf
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Name</label>
                                                                <input type="text" class="form-control" id="name" name="name"
                                                                     value="{{ Auth::user()->name}}" >

                                                            </div>
                                                        </div>

                                                    </div>


                                                    <div class="row">


                                                        <div class="col-md-12">
                                                            <div class="mb-3 ">
                                                                <label for="example-email-input" class="col-md-2 form-label">Email</label>
                                                                    <input class="form-control" type="email" value=" {{ Auth::user()->email }} "
                                                                    readonly id="example-email-input">
                                                            </div>
                                                        </div>


                                                    </div>

                                                    <div>
                                                        <button class="btn btn-primary m-1" type="submit">Update Profile</button>
                                                         <a href="{{ url('password/reset') }}"
                                                        class="btn btn-warning float-between" >Update Password</a>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                        <!-- end card -->
                                    </div> <!-- end col -->

                                    </p>

                                </div>
                            </div>
                            <!--/ post 1 -->
                        </div>
                        <!--/ center profile info section -->



@endsection
