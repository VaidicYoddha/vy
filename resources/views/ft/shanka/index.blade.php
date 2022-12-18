@extends('master')

@section('title')
Vaidic Yoddha
@endsection


@section('content')
<div class="content-wrapper container-xxl p-0">
    <div class="content-body">
        <!-- search header -->
        <section id="faq-search-filter">
            <div class="card faq-search" style="background-image: url('../../../app-assets/images/banner/banner.png')">
                <div class="card-body bg-warning text-center">
                    <!-- main title -->
                    <h3 class="text-primary">Search Here ..... </h3>

                    <!-- search input -->
                    <form action="{{ url('/shanka-samadhan/search/') }}" class="faq-search-input" method="GET">
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


        <!-- vertical tab pill -->
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="tab-content">
                    <form action="{{ url('shanka-samadhan') }}" method="get">
                        <div class=" mb-1 ">
                            <select class="select2 form-select" id="select2-basic" onchange="location.href=this.value;" name="subject">
                                @foreach ($allSubjects as $item)
                                    <option
                                        value=" {{ route('shanka','subject='.$item->id)}}"
                                        @if($item->id == $selectedSubject) selected="selected"
                                        @endif>
                                        {{ $item->subject}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-9 col-md-6 col-sm-3">

                <div class="card border border-dark ">

                    <div class="card-content">
                        <div class="card-body text-danger fw-bolder email-app-list">

                            <div class="tab-content">

                                <div class="card card-body ">
                                    @foreach ($allShanka as $item)
                                    <div class="col-lg-12 col-md-6 col-sm-3">
                                        <div class="tab-content">
                                                <div class="accordion accordion-margin " id="accordionMargin" data-toggle-hover="true">
                                                    <div class="accordion-item  ">
                                                        <h2 class="accordion-header " id="headingMarginOne{{$item->id}}">
                                                            <button class="accordion-button collapsed btn-relief-danger btn-danger  text-dark fw-bolder" type="button" data-bs-toggle="collapse"
                                                                data-bs-target="#accordionMarginOne{{$item->id}}" aria-expanded="false"
                                                                aria-controls="accordionMarginOne"
                                                                style=" font-family: 'Mukta', sans-serif;
                                                                    line-height: 1.6; text-justify:auto;">

                                                            <span class="badge bg-dark mx-1">
                                                                {{ $item->subject->subject }} -
                                                            </span>
                                                            {{ $item->shanka }}
                                                            </button>
                                                        </h2>
                                                        <div id="accordionMarginOne{{$item->id}}" class="accordion-collapse collapse border border-dark border-5"
                                                            aria-labelledby="headingMarginOne" data-bs-parent="#accordionMargin">
                                                            <div class="accordion-body ">

                                                              Samadhan karta -  {{ $item->author->name }}
                                                                <hr>

                                                                {!! $item->samadhan !!}

                                                                {{-- @foreach ($item->chapters as $chapter)
                                                                    <a href="{{ url('granth/'.$chapter->language->name.'/'.$chapter->arshbooks->id.'/'.$chapter->id)}}">
                                                                        <span class="badge  bg-warning cursor-pointer p-1 mb-1">
                                                                        {{ $chapter->chapter_no}}
                                                                        </span>
                                                                    </a>
                                                                @endforeach --}}


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                 @endforeach


                                </div>


                                <!--  Pagination Starts -->
                                <section id="ecommerce-pagination">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination justify-content-center mt-2">
                                                    {{-- {{ $allShanka->links() }} --}}
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </section>
                                <!--  Pagination Ends -->

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
