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
                    <form action="{{ url('/sp/search/') }}" class="faq-search-input" method="GET">
                        @csrf
                        <div class="input-group input-group-merge">
                            <div class="input-group-text">
                                <i data-feather="search"></i>
                            </div>
                            <input name="search" type="text" class="form-control" placeholder="Search ..."
                                value="{{ $search }}" />
                        </div>
                    </form>

                </div>
            </div>
        </section>
        <!-- /search header -->

        <!-- frequently asked questions tabs pills -->
        <section id="faq-tabs">
            <!-- vertical tab pill -->
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">


                </div>

                <div class="col-lg-9 col-md-8 col-sm-12">
                    <!-- pill tabs tab content -->
                    <div class="text-center ">
                        <a href="{{ url('/sp')}}" class="btn btn-sm btn-dark">
                            Back
                        </a>
                        <div>
                            <h2 class="p-1 posttitle fw-bolder text-primary text-center">
                                Search Result : {{ $search }}
                            </h2>

                        </div>
                    </div>
                    <!-- pill tabs tab content -->

                    @foreach ($sp as $item)
                    <div class="accordion accordion-margin" id="accordionMargin" data-toggle-hover="true">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingMarginOne{{$item->id}}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accordionMarginOne{{$item->id}}" aria-expanded="false"
                                    aria-controls="accordionMarginOne">
                                    {{ $item->spbook->title }} : {!! $item->title !!}
                                </button>
                            </h2>
                            <div id="accordionMarginOne{{$item->id}}" class="accordion-collapse collapse"
                                aria-labelledby="headingMarginOne" data-bs-parent="#accordionMargin">
                                <div class="accordion-body">

                                    {!! $item->content !!}

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
        </section>

    </div>
</div>



@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#select2-basic').change(function () {
            $(this).closest('form').submit();
        });
    });

</script>


@endsection
