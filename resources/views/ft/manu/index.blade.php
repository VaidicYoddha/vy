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


        <!-- vertical tab pill -->
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="tab-content">
                    <form action="{{ url('manusmriti') }}" method="get">
                        <div class=" mb-1 ">

                            <select class="select2 form-select" id="select2-basic" name="chapter">
                                @foreach ($allchapters as $item)
                                <option value="{{$item->id}}" @if($item->id == $selectedChapter)
                                    selected="selected" @endif >
                                    {{ $item->mchapter_no}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>

                <div class="tab-content">
                    <div class=" mb-1 ">
                        <select class="select2 form-select" onchange="location.href=this.value;" id="">
                            @foreach ($allShloks as $item)
                            <option value="{{ route('manusmriti','chapter='.$selectedChapter.'&shlok='.$item->id)}}"
                                @if($item->id == $selectedShlok) selected="selected"
                                @endif >
                                {{ $item->mshlok_no}}
                            </option>
                            @endforeach
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
                                    <span class="badge bg-info">Shlok List </span>
                                    <hr>
                                    @foreach ($item->mshlok as $item)
                                    <a href="{{ url('manusmriti/'.$item->mchapter->id.'/'.$item->id)}}">
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

                <div class="card border border-dark ">

                    <div class="card-content">
                        <div class="card-body text-danger fw-bolder email-app-list">

                            <div class="tab-content">

                                <div class="card card-body ">
                                    @foreach ($allShloks as $item)
                                    <ul class="list-group  ">

                                        <li class="list-group-item bg-warning mt-1">
                                            <a href="{{ url('manusmriti/'.$item->mchapter->id.'/'.$item->id)}}">
                                                <span class="badge bg-dark mx-1">
                                                    Chapter {{ $item->mchapter->mchapter_no }}
                                                </span>
                                                {{ $item->title }}
                                            </a>
                                        </li>

                                    </ul>
                                    @endforeach
                                </div>


                                <!--  Pagination Starts -->
                                <section id="ecommerce-pagination">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination justify-content-center mt-2">
                                                    {{ $allShloks->links() }}
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
                {{--
                              <div class=" row p-1">
                                    <div class="col-md-6 col-lg-5">
                                        <div class="card">
                                            @if ($prev_id)
                                            <div class="card-body">
                                                <h5> <i data-feather='arrow-left'></i> Prev </h5>
                                                <div>
                                                    <a href="{{ url('sp?language='.$prev_id->spbook->id.'&chapter='.$prev_id->id) }}"
                                                    class="">
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
                                                    <a href="{{ url('sp?language='.$next_id->spbook->id.'&chapter='.$next_id->id) }}" class="">
                                                        {{$next_id->title }}
                                                    </a>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                            </div> --}}

    </div>

    </div>
    </div>

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
