@extends('master')

{{-- @section('url')
{{ env('APP_URL') }}

@endsection --}}

@section('title')
{{ env('APP_NAME') }} - {{$post->title}} |

@endsection

@section('content')

<section id="dashboard-ecommerce">
    <div class="row ">
        <!-- Blog Card -->
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">

            <div class="card border border-dark">
                <div class="card-header">
                    <h2 class="p-1 posttitle fw-bolder text-primary text-align-justify" style="font-family: 'Eczar', serif;">
                        {{ $post->title}}
                    </h2>
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

                    <div class="card-body text-danger fw-bolder">
                        <!-- Blog Content -->

                        <div class="p-1 card-subtitle bg-light mb-1">
                            Category :- <a href="{{ url('category/'.$post->category->slug) }} "> {{$post->category->name}}</a>  ({{ $post->category->count()}})
                        </div>

                        <h5 class="textdata m-1" >
                            <p class="posttitle" style="font-family: 'Rozha One', serif; ">
                                {!! $post->content !!}
                            </p>
                        </h5>
                        <!-- Blog Content -->

                        <!-- Blog Refrences -->
                        <div class="accordion" id="accordionHover" data-toggle-hover="true">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingHoverOne">
                                    <button class="accordion-button collapsed accordion-hover-title" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#accordionHoverOne"
                                        aria-expanded="false" aria-controls="accordionHoverOne">
                                        Refrences
                                    </button>
                                </h2>
                                <div id="accordionHoverOne" class="accordion-collapse show"
                                    aria-labelledby="headingHoverOne" data-bs-parent="#accordionHover">
                                    <div class="accordion-body text-primary">
                                        {!! $post->ref !!}
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingHoverTwo">
                                    <button class="accordion-button collapsed accordion-hover-title" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#accordionHoverTwo"
                                        aria-expanded="false" aria-controls="accordionHoverTwo">
                                        Tags
                                    </button>
                                </h2>
                                <div id="accordionHoverTwo" class="accordion-collapse show"
                                    aria-labelledby="headingHoverTwo" data-bs-parent="#accordionHover">
                                    <div class="accordion-body">
                                        @foreach ($post->tags as $tag)
                                        <a href="{{ url('tag/'.$tag->slug) }}">
                                            <span class="badge badge-glow bg-warning cursor-pointer mb-1">
                                                {{$tag->name}}
                                            </span>
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Blog Refrences -->

                        <!-- Blog Share -->
                        <hr class="my-2" />
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center me-1">
                                    <a href="#" class="me-50">
                                        <i data-feather="message-square"
                                            class="font-medium-5 text-body align-middle"></i>
                                    </a>
                                    <a href="#">
                                        <div class="text-body align-middle">{{ $post->comments()->count()}}</div>
                                    </a>
                                </div>

                                <div class="d-flex align-items-center me-1">
                                    <a href="#" class="me-50">
                                        <i class="fas fa-eye font-medium-5 text-body align-middle"></i>
                                    </a>
                                    <a href="#">
                                        <div class="text-body align-middle">{{views($post)->count()}}</div>
                                    </a>
                                </div>
                            </div>
                            <!-- Blog Share -->
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

            <!-- Blog Author -->
            <div class="card border border-dark">
                <div class="card-header">
                    <h2 class="card-title text-dark fw-bolder">
                        Author
                    </h2>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote ps-1 border-start-primary border-start-3">
                        <div class="d-flex flex-row">
                            <div class="me-1">
                                <img class="rounded-circle" src=" https://ui-avatars.com/api/?name={{$post->author->name}}&color=ff0000&bold=true" alt="avatar"
                                     height="64" width="64" />
                            </div>
                            <div class="row">
                                <div class="text-dark font-bolder">
                                    <a href="{{ url('author/'.$post->author->id) }}">
                                        <h2 class="text-warning"> {{$post->author->name}} </h2>
                                    </a>
                                </div>
                                <div class="">
                                    <h6>
                                        {{ strip_tags( \Illuminate\Support\Str::words($post->author->bio, 50,'...')) }}....
                                    </h6>
                                </div>

                            </div>
                        </div>

                    </blockquote>
                </div>
            </div>
            <!-- Blog Author -->

            <!-- Blog Prev -->

            <div class=" row p-1">

                <div class="col-md-6 col-lg-5">
                    <div class="card">
                        @if ($prev_id)
                        <div class="card-body">
                            <h5> <i data-feather='arrow-left'></i> Prev </h5>
                            <div>
                                <a href="{{ url('post/'.$prev_id->slug.'/'.$prev_id->id) }}" class="">
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
                                <a href="{{ url('post/'.$next_id->slug.'/'.$next_id->id) }}" class="">
                                    {{$next_id->title }}
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>


            </div>

            <!-- Blog Next -->

            <!-- Leave a Blog Comment -->
          @if (Auth::User())
            <div class="col-12 mt-1">
                <h6 class="section-label mt-25">Leave a Comment</h6>
                <div class="card ">
                    <div class="card-body">
                        @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                <div class="alert-body">
                                    <strong>
                                        {{ session('success') }}
                                    </strong>
                                </div>
                            </div>
                        @endif
                        <form action="{{ url('comment')}}" method="POST" class="form">
                             @csrf
                            <div class="row">

                                <div class="col-12">
                                    <textarea class="form-control mb-2"
                                        placeholder="Comment" name="message"></textarea>
                                      <input type="hidden" name="post_slug" value="{{ $post->slug }}">
                                </div>

                                <div class="col-12 mt-1">
                                    <button type="submit" class="btn btn-primary">Post Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @else
            <div class="col-12 mt-1">
                <h6 class="section-label mt-25">Leave a Comment</h6>
                <div class="card alert alert-danger" role="alert">
                    <div class="card-body">
                        <span class="">
                                  Please <a href=" {{ route('login')}} ">Login</a>  First To  Leave a Comment
                        </span>
                    </div>
                </div>
            </div>
          @endif


            <!--/ Leave a Blog Comment -->

            <!-- Blog Comment -->
            <div class="col-12 mt-1" id="blogComment">
                <h6 class="section-label mt-25">Comment</h6>
                <div class="card ">
                    <div class="card-body">
                        @forelse ($post->comments as $comment)
                           @if ($comment->is_visible==1)

                        <div class="d-flex align-items-start mt-1">
                            <div class="avatar me-75">
                                <span class="avatar">
                                    <img src="https://ui-avatars.com/api/?name={{$comment->user->name }}" width="38"
                                        height="38" alt="Avatar" />
                                    @if(Cache::has('user-is-online-' .$comment->user->id))
                                      <span class="avatar-status-online"></span>
                                     @else
                                       <span class="avatar-status-offline"></span>
                                     @endif
                                </span>
                            </div>
                            <div class="author-info">
                                <h6 class="fw-bolder mb-25"> {{ $comment->user->name }}  </h6>
                                <p class="card-text">{{ $comment->created_at->format('d/m/Y g:i a')}}</p>
                                <p class="card-text">
                                    {!! $comment->message !!}
                                </p>
                                <a href="javascript: void(0);">
                                    <div class="d-inline-flex align-items-center btn btn-flat-primary"
                                    onclick="showReplyForm('{{$comment->id}}', '{{ $comment->user->name }}')">
                                        <i data-feather="corner-up-left" class="font-medium-3 me-50"></i>
                                        <span>Reply</span>
                                    </div>
                                </a>
                                  @if (Auth::check() && Auth::id() == $comment->user_id )
                                    <a href="{{ url('delete-comment/'.$comment->id)}}">
                                        <div class="d-inline-flex align-items-center btn btn-flat-danger">
                                            <i data-feather="x" class="font-medium-3 me-50"></i>
                                            <span > Delete </span>
                                        </div>
                                    </a>
                                  @endif
                                  <div class="card col-12" id="reply-form-{{$comment->id}}" style="display:none">
                                    <div class="card-body">
                                        <form action="{{ url('comment/reply')}}" method="POST" class="form">
                                            @csrf
                                            <div class="row">
                                                 @if (Auth::User())
                                                <div class="col-12">
                                                    <input type="hidden" name="post_slug" value="{{ $post->slug }}">
                                                    <input type="hidden" name="post_id"  value="{{ $post->id }}">
                                                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                    <textarea class="form-control mb-1" id="reply-form-{{$comment->id}}-text"
                                                        rows="4"  placeholder="Comment" name="message"></textarea>
                                                </div>
                                                 <div class="col-12 ">
                                                    <button type="submit" class="btn btn-primary">Reply</button>
                                                </div>
                                                 @else
                                                <div class="col-12 mt-1">
                                                        <h6 class="section-label mt-25">Leave a Reply</h6>
                                                        <div class="card alert alert-danger" role="alert">
                                                            <div class="card-body">
                                                                <span>
                                                                        Please <a href=" {{ route('login')}} ">Login</a> First To  Leave a Reply
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif


                        @include('ft.blog.postcomm', ['comments' => $comment])
                        @empty
                            <div class="alert alert-dark" role="alert">
                                <div class="alert-body">
                                    <strong>
                                        No Comments yet.
                                    </strong>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <!--/ Blog Comment -->

        </div>
        <!--/ Statistics Card -->

        <!-- side Card -->
        @include('inc.sidebar')
        <!--/ Side Card -->

    </div>




</section>



@section('script')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
        $(document).on('click', '.deleteComment', function () {


            if (confirm('Are you sure you want ti delete this comment?')) {
                var thisClicked = $(this);
                var comment_id = thisClicked.val();

                $.ajax({
                    type: "POST",
                    url: "/delete-comment",
                    data: {
                        'comment_id': comment_id
                    },
                    success: function (res) {
                        if (res.status == 200) {
                            thisClicked.closest('.comment-container').remove()
                            alert(res.message);
                        } else {
                            alert(res.message);
                        }
                    }
                });
            }
        });
    });

</script>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: ' autolink charmap  emoticons  link lists  searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link   table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        mobile: {
                menubar: true
            }
    });
  </script>


<script type="text/javascript">
    function showReplyForm(commentId, user) {
        var x = document.getElementById(`reply-form-${commentId}`);
        var input = document.getElementById(`reply-form-${commentId}-text`);

        if (x.style.display === "none") {
            x.style.display = "block";
            input.innerText = `@${user} `;

        } else {
            x.style.display = "none";
        }
    }

</script>

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
  let postTitle = encodeURI('{{$post->title}}');

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

FB.ui({
    method: 'feed',
    link: 'https://developers.facebook.com/docs/'
  }, function(response){});

@endsection


@endsection
