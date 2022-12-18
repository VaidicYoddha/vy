
@extends('master')

@section('title')
Vaidic Yoddha
@endsection


@section('content')

<section id="card-actions">
  <!-- Info table about actions -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Authors List</h4>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li>
                <a data-action="collapse"><i data-feather="chevron-down"></i></a>
              </li>
              <li>
                <a data-action="reload"><i data-feather="rotate-cw"></i></a>
              </li>
              <li>
                <a data-action="close"><i data-feather="x"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="card-content collapse show">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Sr.No</th>
                        <th>Name</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($authors as $item)  
                            <tr>                                              
                                <td>
                                    {{$item->id}}
                                </td>                  
                                <td>
                                   <a href=" {{ url('author/'.$item->id) }} ">{{$item->name}} </a>                            
                                </td>   
                            </tr>     
                      @endforeach               
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
                        <!--  Pagination Starts -->
              <section id="ecommerce-pagination">
                <div class="row">
                  <div class="col-sm-12">
                    <nav aria-label="Page navigation example">
                      <ul class="pagination justify-content-center mt-2">
                        {{$authors->links()}}
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
      </div>
    </div>
  </div>
  <!--/ Info table about actions -->


</section>

@endsection