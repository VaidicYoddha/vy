@extends('master')

@section('title')
Vaidic Yoddha
@endsection


@section('content')


<!-- Navigation -->
<section id="card-navigation">
    <h5 class=" mb-2">Granth Search Engine</h5>
    <div class="row">
        <div class="col-xl-12 col-lg-10 col-md-6 col-sm-6">

            <div class="card text-center">

                <div class="card-body row">
                    @foreach ($books as $item)
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="tab-content">
                                <div class="accordion accordion-margin " id="accordionMargin" data-toggle-hover="true">
                                    <div class="accordion-item  ">
                                        <h2 class="accordion-header " id="headingMarginOne{{$item->id}}">
                                            <button class="accordion-button collapsed btn-relief-danger btn-danger  text-dark fw-bolder" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#accordionMarginOne{{$item->id}}" aria-expanded="false"
                                                aria-controls="accordionMarginOne"
                                                style=" font-family: 'Mukta', sans-serif;
                                                    line-height: 1.6; text-justify:auto;">

                                                    {{ $item->name}} - {{ $item->language->name }}
                                            </button>
                                        </h2>
                                        <div id="accordionMarginOne{{$item->id}}" class="accordion-collapse collapse border border-dark border-5"
                                            aria-labelledby="headingMarginOne" data-bs-parent="#accordionMargin">
                                            <div class="accordion-body ">

                                                <span class="badge bg-info">chapters </span>
                                                <hr>

                                                @foreach ($item->chapters as $chapter)
                                                    <a href="{{ url('granth/'.$chapter->language->name.'/'.$chapter->arshbooks->id.'/'.$chapter->id)}}">
                                                        <span class="badge  bg-warning cursor-pointer p-1 mb-1">
                                                        {{ $chapter->chapter_no}}
                                                        </span>
                                                    </a>
                                                @endforeach


                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                 @endforeach

                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center mt-2">

                              <li class="page-item">
                                {{ $books->links() }}
                                </li>
                          </nav>

                    </div>
                  </div>

            </div>


        </div>

    </div>
</section>
<!--/ Navigation -->

@endsection
