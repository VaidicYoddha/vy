
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
                    <form action="{{ url('/granth/search/') }}" class="faq-search-input" method="GET">
                        @csrf
                        <div class="input-group input-group-merge">
                            <div class="input-group-text">
                                <i data-feather="search"></i>
                            </div>
                            <input name="search" type="text" class="form-control" placeholder="Search Granths ..." />
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- /search header -->


              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="tab-content mb-2">
                        <a href="{{ url('/granth') }}" class="btn btn-dark">
                            Back to List
                        </a>
                    </div>



                    <div class="tab-content">
                        <ul class="list-group">
                            @foreach ($book as $item)
                                @foreach ($item->chapters as $chapter)
                                    <h5><li class="list-group-item list-group-item-danger">
                                        <a href="{{ url('granth/'.$chapter->language->name.'/'.$chapter->arshbooks->id.'/'.$chapter->id)}}" class="text-dark">
                                        {{ $chapter->chapter_no }} - {{ $chapter->title }}
                                        </a>
                                    </li></h5>
                                @endforeach
                            @endforeach
                          </ul>
                    </div>
                </div>

                <div class="col-lg-9 col-md-8 col-sm-12">
                  <!-- pill tabs tab content -->
                        <div class="card border border-dark">
                            <div class="card-header text-center  justify-content-center">
                                <h2 class="p-1 posttitle fw-bolder text-primary "
                                    style="font-family: 'Eczar', serif;">
                                    {{ $allChapters->arshbooks->name }}
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

                                <div class="card-body text-dark ">
                                    <!-- Blog Content -->
                                    <h3 class="fw-bolder text-center text-danger">
                                        {{ $allChapters->chapter_no }} -   {{ $allChapters->title }}
                                    </h3>

                                    <span class="badge badge-light-danger   ms-auto">{{ $allChapters->language->name }} </span>
                                    <hr>
                                    {!! $allChapters->content !!}

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
                                                        {{views($allChapters)->count()}}
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
                                                <a href="{{ url('granth/'.$prev_id->language->name.'/'.$prev_id->arshbooks->id.'/'.$prev_id->id)}}" class="">
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
                                                <a href="{{ url('granth/'.$next_id->language->name.'/'.$next_id->arshbooks->id.'/'.$next_id->id)}}" class="">
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
