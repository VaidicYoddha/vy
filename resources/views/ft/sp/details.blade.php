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

                    <!-- search input -->
                    <form action="{{ url('/sp/search/') }}" class="faq-search-input" method="GET">
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

            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="tab-content">
                        @foreach ($allBooks as $item)
                        <div class="accordion accordion-margin " id="accordionMargin" data-toggle-hover="true">
                            <div class="accordion-item  ">
                                <h2 class="accordion-header " id="headingMarginOne{{$item->id}}">
                                    <button
                                        class="accordion-button collapsed btn-relief-warning btn-warning  text-dark fw-bolder"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#accordionMarginOne{{$item->id}}" aria-expanded="false"
                                        aria-controls="accordionMarginOne" style=" font-family: 'Mukta', sans-serif;
                                            line-height: 1.6; text-justify:auto;">

                                        {{ $item->name}}
                                    </button>
                                </h2>
                                <div id="accordionMarginOne{{$item->id}}"
                                    class="accordion-collapse collapse border border-dark border-5"
                                    aria-labelledby="headingMarginOne" data-bs-parent="#accordionMargin">
                                    <div class="accordion-body ">
                                        <span class="badge bg-info">chapters </span>
                                        <hr>
                                        @foreach ($item->spchapters as $item)
                                        <a
                                            href="{{ url('sp/'.$item->language->name.'/'.$item->slug.'/'.$item->chapter_no)}}">
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

                        <div class=" card-header text-center  justify-content-center m-0">
                            <h4 class="sptitle posttitle fw-bolder text-primary mb-0 divider-text m-0"
                                style="font-family: 'Ecar', serif;">
                                {{ $chapter->spbook->title}}
                            </h4>
                        </div>

                        <h2 class=" posttitle fw-bolder text-center  text-primary justify-content-center "
                            style="font-family: 'Ecar', serif; ">

                            {{ $chapter->title}}
                        </h2>
                        <div class="card-content">
                            <div class="card-body text-dark mt-0 line-height-2">

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
                                                <div class="text-body align-middle">{{views($chapter)->count()}}</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="dropdown blog-detail-share">
                                        <i data-feather="share-2" class="font-medium-5 text-body cursor-pointer" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="#" class="dropdown-item" id="facebook-btn" target="_blank">
                                                <i data-feather="facebook"></i> Facebook
                                            </a>
                                            <a href="#" class="dropdown-item" id="twitter-btn" target="_blank">
                                                <i data-feather="twitter"></i> twitter
                                            </a>
                                            <a href="#" class="dropdown-item" id="instagram-btn" target="_blank">
                                                <i data-feather="instagram"></i> instagram
                                            </a>
                                            <a href="#" class="dropdown-item" id="whatsapp-btn" target="_blank">
                                                <i class="fab fa-whatsapp"></i> whatsapp
                                            </a>
                                            <a href="#" class="dropdown-item" id="telegram-btn" target="_blank">
                                                <i class="fab fa-telegram"></i> Telegram
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Blog Share -->
                            </div>
                        </div>

                    </div>
                    <!-- Blog Prev -->
                    <div class=" row p-1">
                        <div class="col-md-6 col-lg-5">
                            <div class="card">
                                @if ($prev_id)
                                <div class="card-body">
                                    <h5> <i data-feather='arrow-left'></i> Prev </h5>
                                    <div>
                                        <a href="{{ url('sp/'.$prev_id->language->name.'/'.$prev_id->slug.'/'.$prev_id->chapter_no)}}"
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
                                        <a href="{{ url('sp/'.$next_id->language->name.'/'.$next_id->slug.'/'.$next_id->chapter_no)}}"
                                            class="">
                                            {{$next_id->title }}
                                        </a>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                    </div>
                    <!-- Blog Next -->
                </div>

            </div>
    </div>

</div>




@endsection

 @section('script')
{{-- <script>
    $(document).ready(function () {
        $('#select2-basic').change(function () {
            $(this).closest('form').submit();
        });
    });
</script> --}}

<script>
    // Social Share links.
  const gmailBtn = document.getElementById('gmail-btn');
  const facebookBtn = document.getElementById('facebook-btn');
  const twitterBtn = document.getElementById('twitter-btn');
  const whatsappBtn = document.getElementById('whatsapp-btn');
  const telegramBtn = document.getElementById('telegram-btn');
  const socialLinks = document.getElementById('social-links');
  // posturl posttitle
  let postUrl = encodeURI(document.location.href);
  let postTitle = encodeURI('{{$chapter->title}}');
  facebookBtn.setAttribute("href",`https://www.facebook.com/sharer/sharer.php?u=${postUrl}`);
  twitterBtn.setAttribute("href", `https://twitter.com/share?url=${postUrl}&text=${postTitle}`);
  whatsappBtn.setAttribute("href",`whatsapp://send?text=${postTitle} ${postUrl}`);
  telegramBtn.setAttribute("href",`https://t.me/share/url?url=${postUrl}&text=${postTitle}`);
  gmailBtn.setAttribute("href",`https://mail.google.com/mail/?view=cm&su=${postTitle}&body=${postUrl}`);
  // Button
  const shareBtn = document.getElementById('shareBtn');
  if(navigator.share){
    shareBtn.style.display = 'block';
    socialLinks.style.display = 'none';
    shareBtn.addEventListener('click', ()=>{
      navigator.share({
        title: postTitle,
        url:postUrl
      }).then((result) => {
        alert('Thank You for Sharing.')
      }).catch((err) => {
        console.log(err);
      });;
    });
  }else{
  }
</script>

@endsection
