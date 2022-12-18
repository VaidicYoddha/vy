
@extends('master')

@section('title')
Vaidic Yoddha
@endsection


@section('content')

    <!-- BEGIN: Content-->

      <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
          <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
              <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Satyarth Prakash</h2>
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Pages</a>
                    </li>
                    <li class="breadcrumb-item active">FAQ
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="content-body"><!-- search header -->
            <section id="faq-search-filter">
              <div class="card faq-search" style="background-image: url('../../../app-assets/images/banner/banner.png')">
                <div class="card-body text-center">
                  <!-- main title -->
                  <h2 class="text-primary"> Search</h2>

                  <!-- search input -->
                  <form class="faq-search-input">
                    <div class="input-group input-group-merge">
                      <div class="input-group-text">
                        <i data-feather="search"></i>
                      </div>
                      <input type="text" class="form-control" placeholder="Search in Satyarth Prakash..." />
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
                  <div class="faq-navigation d-flex justify-content-between flex-column mb-2 mb-md-0">
                    <!-- pill tabs navigation -->
                    <div class=" mb-1">
                          <select class="select2 form-select" onchange="location.href=this.value;" id="select2-basic" name="language">
                            <option value="#"> Language </option>  
                            @foreach ($languages as $item)
                                <option value="{{ route('splang.slug',$item->slug)}}">
                                  {{$item->name}}</option>
                            @endforeach
                          </select>
                    </div>
                  </div>
                </div>

                <div class="col-lg-9 col-md-8 col-sm-12">
                  <!-- pill tabs tab content -->
                  <div class="tab-content">
                    @foreach ($languages as $item)
                   
             
                      <!-- frequent answer and question  collapse  -->
                      <div class="accordion " >
                        <div class="card p-1">
                          <h2 class="accordion-header text-center " >
                            <a href="{{ url('sp/'.$item->slug.'/'.$item->spchapters->title.'/'.$item->chapter_no)}}" class="posttitle text-center">                                
                                  {{$item->spchapter->title}}
                             
                              </a> 
                          </h2>
                
                        </div>     
                      </div>
                 
                    @endforeach
                    </div>
                  </div>

                </div>
              </div>
            </section>


@endsection

