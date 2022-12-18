
@extends('master')

@section('title')
Vaidic Yoddha
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/b-2.2.3/b-html5-2.2.3/sb-1.3.4/datatables.min.css"/>
@endsection

@section('content')

<section id="card-actions">
  <!-- Info table about actions -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Post List</h4>
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
                <div class="table-responsive" >
                  <table class="table table-bordered" id="example">
                    <thead>
                      <tr>
                        <th>Sr.No</th>
                        <th>Name</th>
                        <th>category</th>
                        <th>tags</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $item)
                            <tr>
                                <td>
                                    {{$item->id}}
                                </td>
                                <td>
                                   <a href=" {{ url('post/'.$item->slug.'/'.$item->id) }} ">{{$item->title}} </a>
                                </td>
                                 <td>
                                   <a href=" {{ url('category/'.$item->category->slug) }} ">{{$item->category->name}} </a>
                                </td>
                                <td>
                                   @foreach ($item->tags as $tag)
                                   <a href=" {{ url('tag/'.$item->slug) }} ">
                                      <span class="badge badge-glow bg-warning cursor-pointer mb-1">
                                          {{$tag->name}}
                                      </span>
                                  </a>
                                   @endforeach
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
                        {{$posts->links()}}
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

@section('script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/b-2.2.3/b-html5-2.2.3/sb-1.3.4/datatables.min.js"></script>

<script>
  $(document).ready(function () {
    $('#example').DataTable();
});
</script>
@endsection
