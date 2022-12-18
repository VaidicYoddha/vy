
@extends('master')

@section('title')
Vaidic Yoddha
@endsection


@section('content')

 <section id="dashboard-ecommerce">
          <div class="row ">
            <!-- Blog Card -->
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
              <div class=" card-statistics">
                <div class=" statistics-body">
                  <section id="card-demo-example">
                       <!-- Blog Filter -->
                    <div class="col-12 mb-1">
                      <div class="p-2 card ecommerce-header-items ">
                        <div class="row view-options d-flex">
                           <div class="col-md-6 col-lg-4  mb-1 ">
                            <h3 class="text-danger h3">
                              Tag : #{{$tag->name}}
                            </h3>
                          </div>                
                            <div class="col-md-6 col-lg-4">
                              <h6> 
                                <span class="badge bg-info badge-glow rounded-pill ms-auto">
                                    {{ $post->count()}} 
                                </span> 
                                <span class="badge bg-light-success  rounded-pill ms-auto">
                                    results found in {{$tag->name}}
                                </span>
                              </h6>
                            </div>

                        </div>
                      </div>
                    </div>
                     <!-- Blog Filter -->

                      <!-- Blog List -->
                    <div class="row ">
                        @foreach ($post as $item)
                        <div class="col-md-12 col-lg-12">
                              <div class="card  border border-primary mb-2">
                                  <div class="card-header">
                                      <h3 class="p-1 posttitle fw-bolder text-primary text-align-justify" style="font-family: 'Eczar', serif;">
                                          <a href="{{ url('post/'.$item->slug.'/'.$item->id) }}">
                                            {{ $item->title }}
                                          </a>
                                      </h3>
                
                                     </div>
                        
                                  <div class="card-body">
                                    <a href="{{ url('post/'.$item->slug.'/'.$item->id) }}" class="floar-end btn btn-flat-primary"> Read More</a>
                                   <span >
                                        views
                                        <span class="badge badge-light-info   ms-auto">{{views($item)->count()}}</span>
                                    </span> 
                                    <span >
                                        Comments
                                        <span class="badge badge-light-info   ms-auto">{{ $item->comments()->count()}}</span>
                                    </span> 
                                    <span >
                                        Likes
                                        <span class="badge badge-light-info   ms-auto">23</span>
                                    </span>       
                                      <span class="float-end badge badge-light-dark">
                                       <a href="{{ url('author/'.$item->author->id) }}">Author -{{ $item->author->name }}</a> 
                                      </span>            
                                  </div>
                               
                                </div>
                            </div>
                       @endforeach
                     </div>
                      <!-- Blog List -->
                  </section>
                </div>
              </div>
              <!--  Pagination Starts -->
              <section id="ecommerce-pagination">
                <div class="row">
                  <div class="col-sm-12">
                    <nav aria-label="Page navigation example">
                      <ul class="pagination justify-content-center mt-2">
                        {{ $post->links() }}
                        {{-- <li class="page-item" aria-current="page">
                            <a class="page-link" href="#">
                                {{ $posts->links() }}
                            </a>
                        </li> --}}

                      </ul>
                    </nav>
                  </div>
                </div>
              </section>
              <!--  Pagination Ends -->

            </div>
            <!--/ Statistics Card -->

            <!-- side Card -->
           @include('inc.sidebar')  
            <!--/ Side Card -->

          </div>



          <div class="row match-height">
            <!-- Company Table Card -->
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
              <div class="card card-company-table">

                <div class="card-body p-5">

                  <div class="row ">
                    <div class="col-md-6 col-lg-4">
                      <div class="card border border-5 border-dark">
                        <img class="card-img-top" src="{{ asset('/front')}}/app-assets/images/slider/04.jpg" alt="Card image cap" />
                        <div class="card-body">
                          <h4 class="card-title">Card title</h4>
                          <p class="card-text">
                            Some quick example text to build on the card title and make up the bulk of the card's
                            content.
                          </p>
                          <a href="#" class="btn btn-outline-primary"> Read More</a>
                        </div>
                      </div>
                    </div>

                  </div>


                </div>
              </div>
            </div>
            <!--/ Company Table Card -->

            <!-- Developer Meetup Card -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
              <div class="card card-developer-meetup">
                <div class="meetup-img-wrapper rounded-top text-center">

                </div>
                <div class="card-body">



                </div>
              </div>
            </div>
            <!--/ Developer Meetup Card -->



          </div>
        </section>

    
@endsection