
@extends('master')

@section('title')
Vaidic Yoddha
@endsection


@section('content')


      <div class="content-wrapper container-xxl p-0">
        <div class="content-body"><!-- search header -->
          <section id="faq-search-filter">
            <div class="card faq-search" style="background-image: url('../../../app-assets/images/banner/banner.png')">
              <div class="card-body bg-warning text-center">

                <!-- search input -->
                <form action="{{ url('/sptest/search/') }}" class="faq-search-input"  method="GET">
                  @csrf
                  <div class="input-group input-group-merge">
                    <div class="input-group-text">
                      <i data-feather="search"></i>
                    </div>
                    <input name="search" type="text" class="form-control" 
                    placeholder="Search ..." />
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
                  <div class="tab-content">
                    @foreach ($allBooks as $item)
                        <div class="accordion accordion-margin " id="accordionMargin" data-toggle-hover="true">
                            <div class="accordion-item  ">
                                <h2 class="accordion-header " id="headingMarginOne{{$item->id}}">
                                    <button class="accordion-button collapsed btn-relief-warning btn-warning  text-dark fw-bolder" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#accordionMarginOne{{$item->id}}" aria-expanded="false"
                                        aria-controls="accordionMarginOne"  
                                        style=" font-family: 'Mukta', sans-serif;
                                            line-height: 1.6; text-justify:auto;">
                                        
                                               {{ $item->name}}     
                                    </button>
                                </h2>
                                <div id="accordionMarginOne{{$item->id}}" class="accordion-collapse collapse border border-dark border-5"
                                    aria-labelledby="headingMarginOne" data-bs-parent="#accordionMargin">
                                    <div class="accordion-body ">
                                        <span class="badge bg-info">chapters </span> 
                                        <hr>
                                        @foreach ($item->spchapters as $item)
                                            <a href="{{ url('sptest/'.$item->language->name.'/'.$item->slug.'/'.$item->chapter_no)}}">
                                                <span class="badge  bg-warning cursor-pointer p-1 mb-1">
                                                {{ $item->chapter_no}} 
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

            <div class="col-lg-9 col-md-8 col-sm-12 mt-2">
  
              <div class="card border border-dark ">
               
                  <div class="card-header text-center" > 
                      <h2 class="p-1 posttitle fw-bolder text-primary " style="font-family: 'Ecar', serif;">
        
                         {{ $chapter->title}}  
                      </h2>
                  </div>
                            <div class="card-content" >
                                <div class="card-body text-dark ">
                                     
                                      <h5 class="textdata " >
                                          <p class="posttitle" style="font-family: 'Rozha One', serif; ">
                                            
                                          </p>
                                      </h5>
                                     
                                      {!! $chapter->content !!}   

                               

                                        <!-- Blog Share -->
                                        <hr class="my-2" />
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">

                                                <div class="d-flex align-items-center me-1">
                                                    <a href="#" class="me-50">
                                                        <i class="fas fa-eye font-medium-5 text-body align-middle"></i>
                                                    </a>
                                                    <a href="#">
                                                        <div class="text-body align-middle">139</div>
                                                    </a>
                                                </div>
                                            </div>
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
                                                    <a href="{{ url('sp?language='.$prev_id->spbook->id.'&chapter='.$prev_id->id) }}" class="">
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
        </section>
        <!-- / frequently asked questions tabs pills -->
           </div>
          </div>



@endsection

{{-- @section('script')
<script>
    $(document).ready(function () {
        $('#select2-basic').change(function () {
            $(this).closest('form').submit();
        });
    });

</script>


@endsection --}}

