
@extends('master')

@section('title')
Vaidic Yoddha
@endsection


@section('content')

    <!-- BEGIN: Content-->

      <div class="content-wrapper container-xxl p-0">

        <div class="content-body">
        <!-- search header -->
        <section id="faq-search-filter">
            <div class="card faq-search" style="background-image: url('../../../app-assets/images/banner/banner.png')">
                <div class="card-body bg-warning text-center">

                    <!-- search input -->
                    <form action="{{ url('/manusmriti/search/') }}" class="faq-search-input" method="GET">
                        @csrf
                        <div class="input-group input-group-merge">
                            <div class="input-group-text">
                                <i data-feather="search"></i>
                            </div>
                            <input name="search" type="text" class="form-control" placeholder="Search ..." />
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- /search header -->


              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="tab-content">
                        <form action="{{ url('manusmriti') }}" method="get">
                            <div class=" mb-1 ">

                            <select class="select2 form-select" id="select2-basic" name="chapter">

                                <option value="" >

                                </option>

                            </select>
                            </div>
                        </form>
                        </div>

                        <div class="tab-content">
                            <div class=" mb-1 ">
                            <select class="select2 form-select" onchange="location.href=this.value;" id="" >

                                <option value="">

                                </option>

                            </select>
                            </div>
                        </div>

                    <div class="tab-content">
                        @foreach ($allchapters as $item)
                        <div class="accordion accordion-margin " id="accordionMargin" data-toggle-hover="true">
                            <div class="accordion-item  ">
                                <h2 class="accordion-header " id="headingMarginOne{{$item->id}}">
                                    <button
                                        class="accordion-button collapsed btn-relief-primary btn-primary  text-dark fw-bolder"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#accordionMarginOne{{$item->id}}" aria-expanded="false"
                                        aria-controls="accordionMarginOne" style=" font-family: 'Mukta', sans-serif;
                                            line-height: 1.6; text-justify:auto;">

                                       Chapter {{ $item->mchapter_no}}
                                    </button>
                                </h2>
                                <div id="accordionMarginOne{{$item->id}}"
                                    class="accordion-collapse collapse border border-dark border-5"
                                    aria-labelledby="headingMarginOne" data-bs-parent="#accordionMargin">
                                    <div class="accordion-body ">
                                        <span class="badge bg-dark">Shlok List </span>
                                        <hr>
                                        @foreach ($item->mshlok as $item)
                                        <a
                                            href="{{ url('manusmriti/'.$item->mchapter->id.'/'.$item->id)}}">
                                            <span class="badge  bg-warning cursor-pointer p-1 mb-1">
                                                {{ $item->mshlok_no}}
                                            </span>
                                        </a>
                                        @endforeach



                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-9 col-md-8 col-sm-12">
                  <!-- pill tabs tab content -->
                        <div class="card border border-dark">
                            <div class="card-header text-center  justify-content-center">
                                <h2 class="p-1 posttitle fw-bolder text-primary "
                                    style="font-family: 'Eczar', serif;">
                                    {{ $shlok->mshlok_no}} {{ $shlok->title}}
                                </h2>
                                <div class="heading-elements">

                                    <ul class="list-inline mb-0">
                                        <li></li>
                                            <a data-action="collapse"><i data-feather="chevron-down"></i></a>
                                            <a data-action="reload"><i data-feather="rotate-cw"></i></a>
                                        </li>
                                    </ul>

                                </div>
                            </div>

                            <div class="card-content collapse show">

                                <div class="card-body text-dark fw-bolder">
                                    <!-- Blog Content -->

                                    @foreach ($shlokdetails as $item)
                                    <div class="accordion accordion-margin" id="accordionMargin" data-toggle-hover="true">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingMarginOne{{$item->id}}">
                                                <button class="accordion-button btn-relief-danger btn-danger  fw-bolder" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#accordionMarginOn{{$item->id}}" aria-expanded="false"
                                                    aria-controls="accordionMarginOne">
                                                    {{ $item->language->name }} :  {{ $item->chaptername->name }}
                                                    <span class="badge bg-dark mx-1">
                                                        {{ $item->author->name }}
                                                    </span>
                                                </button>
                                            </h2>
                                            <div id="accordionMarginOn{{$item->id}}" class="accordion-collapse show border border-dark border-5"
                                                aria-labelledby="headingMarginOne" data-bs-parent="#accordionMargin">
                                                <div class="accordion-body">

                                                    {!! $item->details !!}

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    <!-- Blog Content -->


                                    <!-- Blog Share -->
                                    <hr class="my-2" />
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">

                                            <div class="d-flex align-items-center me-1">
                                                <a href="#" class="me-50">
                                                    <i class="fas fa-eye font-medium-5 text-body align-middle"></i>
                                                </a>
                                                <a href="#">
                                                    <div class="text-body align-middle">
                                                        {{views($details)->count()}}
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Blog Share -->
                                        <div class="dropdown blog-detail-share">

                                            <i data-feather="share-2" class="font-medium-5 text-body cursor-pointer" role="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="#" class="dropdown-item" target="_blank">
                                                    <i data-feather="facebook"></i> Facebook
                                                </a>
                                                <a href="#" class="dropdown-item" target="_blank">
                                                    <i data-feather="twitter"></i> twitter
                                                </a>
                                                <a href="#" class="dropdown-item" target="_blank">
                                                    <i data-feather="instagram"></i> instagram
                                                </a>
                                                <a href="#" class="dropdown-item" target="_blank">
                                                    <i class="fab fa-whatsapp"></i> whatsapp
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Blog Share -->
                                </div>
                            </div>
                        </div>

                            <div class=" row p-1">

                                <div class="col-md-6 col-lg-5">
                                    <div class="card">
                                        @if ($prev_id)
                                        <div class="card-body">
                                            <h5> <i data-feather='arrow-left'></i> Prev </h5>
                                            <div>
                                                <a href="{{ url('manusmriti/'.$prev_id->mchapter->id.'/'.$prev_id->id)}}" class="">
                                                    {{$prev_id->title }}
                                                </a>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-2">
                                    <div class="">

                                        <div class="">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-5">
                                    <div class="card">
                                        @if ($next_id)
                                        <div class="card-body">
                                            <h5> <i data-feather='arrow-right'></i> Next</h5>
                                            <div>
                                                <a href="{{ url('manusmriti/'.$next_id->mchapter->id.'/'.$next_id->id)}}" class="">
                                                    {{$next_id->title }}
                                                </a>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
        </div>



@endsection
