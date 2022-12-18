
@extends('master')

@section('title')
Vaidic Yoddha
@endsection


@section('content')


      <div class="content-wrapper container-xxl p-0">
        <div class="content-body"><!-- search header -->
         
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
    
          <!-- /search header -->

          <!-- vertical tab pill -->
          <div class="row">
             @foreach ($allBooks as $item)
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="tab-content">
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
                    </div>
                </div>
             @endforeach 
       
             </div>
           </div>
          </div>



@endsection


