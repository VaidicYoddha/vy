@extends('master')

@section('title')
Vaidic Yoddha
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
                            <img src="https://ui-avatars.com/api/?name={{$author->name}}&color=ff0000&bold=true"
                                alt="avatar" class="rounded img-fluid" alt="Card image" />
                        </div>
                        <!-- profile title -->
                        <div class="profile-title ms-3">
                            <h2 class="text-dark fw-bolder">{{ $author->name}}</h2>
                            <p class="text-white">UI/UX Designer</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!--/ profile header -->

    <!-- profile info section -->
    <section id="profile-info">
        <div class="row">
            <!-- left profile info section -->
            <div class="col-12 col-lg-3  ">
                <!-- about -->
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="profile-img-container d-flex align-items-center">
                <div class="profile-img">
                <img
                src="https://ui-avatars.com/api/?name={{$author->name}}&color=ff0000&bold=true" alt="avatar"
                        class="rounded img-fluid"
                        alt="Card image"
                        />
                    </div>
                </div> --}}
                <div class="profile-title ms-3">
                    <h2 class="text-dark fw-bolder">{{ $author->name}}</h2>

                </div>

                <div class="mt-2">
                    <h5 class="mb-75">Phone:</h5>
                    <p class="card-text">{{ $author->phone}}</p>
                </div>
                <div class="mt-2">
                    <h5 class="mb-75">Email:</h5>
                    <p class="card-text">{{ $author->email}}</p>
                </div>
                <div class="mt-2">
                    <h5 class="mb-75">Facebook:</h5>
                    <p class="card-text">{{ $author->facebook}}</p>
                </div>
                <div class="mt-2">
                    <h5 class="mb-75">Twitter:</h5>
                    <p class="card-text">{{ $author->twitter}}</p>
                </div>
                <div class="mt-2">
                    <h5 class="mb-50">Youtube:</h5>
                    <p class="card-text mb-0">{{ $author->youtube}}</p>
                </div>
            </div>
        </div>
        <!--/ about -->

</div>
<!--/ left profile info section -->

<!-- center profile info section -->
<div class="col-lg-9 col-12">
    <!-- post 1 -->
    <div class="card">
        <div class="card-body">

            <h5 class="mb-0 fw-bolder">About</h5>


            <p class="card-text">
                {{ $author->bio}}
            </p>

        </div>
    </div>
    <!--/ post 1 -->

    <!-- post 2 -->
    @forelse ($post as $item)
    <div class="card mt-">
        <div class="card-body">
            <!--  title -->
            <h3 class=" posttitle fw-bolder text-primary text-align-justify" style="font-family: 'Eczar', serif;">
                <a href="{{ url('post/'.$item->slug.'/'.$item->id) }}">
                    {{ $item->title }}
                </a>
            </h3>
        </div>
    </div>
    @empty
    <div class="card">
        <div class="card-body">
            <!--  title -->
            <h3 class=" posttitle fw-bolder text-primary text-align-justify" style="font-family: 'Eczar', serif;">
                No Posts Available
            </h3>
        </div>
    </div>
    @endforelse
    <!--/ post 2 -->


</div>
<!--/ center profile info section -->


</div>


</section>
<!--/ profile info section -->



@endsection
