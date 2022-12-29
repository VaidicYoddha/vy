 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
              <!-- Search Card -->
              <div class="card bg-primary border border-light">
                <div class="card-body">
                <form action="{{ url('/search') }}" method="GET">
                    @csrf
                  <div class="input-group ">
                    <input name="search" type="text" class="form-control " placeholder="Search " />
                    <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                  </div>
                </form>
                </div>
              </div>


              <!-- Cagetories Card -->
              <div class="card ">
                <div class="card-header">
                  <h4 class="card-title">Cagetories</h4>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li>
                        <a data-action="collapse"><i data-feather="chevron-down"></i></a>
                        <a data-action="reload"><i data-feather="rotate-cw"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <div class=" mb-1">

                      <select class="select2 form-select" onchange="location.href=this.value;" id="select2-basic">
                        @foreach ($cats as $item)
                            <option value=" {{ route('category.slug',$item->slug)}}">{{$item->name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <h4 class="card-title">Top Cagetories </h4>
                    <ul class="list-group">
                      @foreach ($categories as $item)
                        <li class="list-group-item d-flex align-items-center">
                        <span>
                         <a href="{{ url('category/'.$item->slug) }}">
                           {{$item->name}}
                        </a>
                        </span>
                        <span class="badge bg-primary badge-glow rounded-pill ms-auto">
                           {{ $item->posts->count()}}
                        </span>
                      </li>

                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>

              <!-- Archive Card -->
              <div class="card ">
                <div class="card-header">
                  <h4 class="card-title">Archive</h4>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li>
                        <a data-action="collapse"><i data-feather="chevron-down"></i></a>
                        <a data-action="reload"><i data-feather="rotate-cw"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                     <!-- Archive dropdown -->
                    <div class=" mb-1">
                      <select class="select2 form-select" onchange="location.href=this.value;" id="select2-nested">
                           <option value="">Select</option>
                          @foreach ($archives as $item)
                          <option value="/?month={{$item['month']}}&year={{$item['year']}}">{{$item['month'].'-'.$item['year']}}</option>
                          @endforeach
                      </select>
                    </div>

                  </div>
                </div>
              </div>

              <!-- Tag Card -->
              <div class="card ">
                <div class="card-header">
                  <h4 class="card-title">Tags</h4>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li>
                        <a data-action="collapse"><i data-feather="chevron-down"></i></a>
                        <a data-action="reload"><i data-feather="rotate-cw"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <h4>
                      @foreach ($tags as $item)
                        <a href="{{ url('tag/'.$item->slug) }}">
                          <span href="" class="badge badge-glow bg-warning cursor-pointer mb-1">
                          {{ $item->name}}
                          </span>
                        </a>
                       @endforeach
                    </h4>
                  </div>
                </div>
              </div>

              <!-- Social Join Card -->
              <div class="card bg-gradient-warning border border-light">
                <div class="card-header">
                  <h4 class="card-title text-light fw-bolder">Join With Us</h4>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li>
                        <a data-action="collapse"><i data-feather="chevron-down"></i></a>
                        <a data-action="reload"><i data-feather="rotate-cw"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">

                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="https://www.facebook.com/vaidicyoddha" target="blank">
                        <button type="button" class="btn btn-outline-light" style="background-color: #4267B2;">
                          <i class="fab fa-facebook"></i>
                        </button>
                      </a>
                      <a href="https://twitter.com/vaidic_yoddha" target="blank">
                        <button type="button" class="btn btn-outline-light" style="background-color: #1DA1F2;">
                          <i class="fab fa-twitter"></i>
                        </button>
                      </a>
                      <a href="https://www.instagram.com/vaidicyoddha/" target="blank">
                        <button type="button" class="btn btn-outline-light instagram">
                          <i class="fab fa-instagram"></i>
                        </button>
                      </a>
                      <a href="https://www.youtube.com/@vaidicyoddha" target="blank">
                        <button type="button" class="btn btn-outline-light" style="background-color: #FF0000;">
                          <i class="fab fa-youtube"></i>
                        </button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Recent Posts -->
              <div class="card ">
                <div class="card-header">
                  <h4 class="card-title">Recent Posts</h4>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li>
                        <a data-action="collapse"><i data-feather="chevron-down"></i></a>
                        <a data-action="reload"><i data-feather="rotate-cw"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <div class="mt-75">
                      @foreach ($recentposts as $item)
                      <div class="d-flex mb-2">
                        <a href="{{ url('post/'.$item->slug.'/'.$item->id) }}" class="me-2">
                          <img class="rounded" src="https://ui-avatars.com/api/?name={{$item->title }}&color=ff0000&bold=true" width="100"
                            height="70" alt="Recent Post Pic" />
                        </a>
                        <div class="blog-info">
                          <h6 class="blog-recent-post-title">
                            <a href="{{ url('post/'.$item->slug.'/'.$item->id) }}" class="text-body-heading">{!! Str::limit($item->title, 35) !!}</a>
                          </h6>
                          <div class="text-muted mb-0">{{ $item->created_at->format('d-m-Y')}}</div>
                        </div>
                      </div>
                       @endforeach
                    </div>
                  </div>
                </div>
              </div>

              <!-- Webs  -->
              <div class="card ">
                <div class="card-header">
                  <h4 class="card-title">Useful Links</h4>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li>
                        <a data-action="collapse"><i data-feather="chevron-down"></i></a>
                        <a data-action="reload"><i data-feather="rotate-cw"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <div class="mt-75">

                      <div class="d-flex mb-2">
                        <div class="blog-info">
                          <h3 class="blog-recent-post-title">
                              @foreach ($links as $item)
                              <a href="{{ $item->web }}" class="text-body-heading">
                                <span href="" class="badge badge-glow bg-dark cursor-pointer mb-1">
                                  {{ $item->name }}
                                </span>
                              </a>
                              @endforeach
                          </h3>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>


            </div>
