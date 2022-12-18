      
      
       @foreach ($comment->replies as $reply)
         @if ($reply->is_visible==1) 
                <div class="card bg-light " id="blogComment" style="margin-left: 10%">
                    <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="avatar me-75">
                                    <span class="avatar">
                                        <img src="https://ui-avatars.com/api/?name={{$reply->user->name }}" width="38"
                                            height="38" alt="Avatar" />
                                        @if(Cache::has('user-is-online-' .$reply->user->id))
                                        <span class="avatar-status-online"></span>
                                        @else
                                        <span class="avatar-status-offline"></span>
                                        @endif
                                    </span>
                                </div>
                                <div class="author-info">
                                    <h6 class="fw-bolder mb-25">{{ $reply->user->name }} </h6>
                                    <p class="card-text">{{ $reply->created_at->format('d/m/Y g:i a')}}</p>
                                    <p class="card-text">
                                         {!! $reply->message !!}
                                    </p>
                                    <a href="#">
                                    <a href="javascript: void(0);">
                                        <div class="d-inline-flex align-items-center btn btn-flat-primary"  
                                        onclick="showReplyForm('{{$reply->id}}', '{{ $reply->user->name }}')">
                                            <i data-feather="corner-up-left" class="font-medium-3 me-50"></i>
                                            <span>Reply</span>
                                        </div>
                                    </a>
                                    @if (Auth::check() && Auth::id() == $reply->user_id )
                                        <a href="{{ url('delete-comment/'.$reply->id)}}">
                                            <div class="d-inline-flex align-items-center btn btn-flat-danger">
                                                <i data-feather="x" class="font-medium-3 me-50"></i>
                                                <span > Delete </span>
                                            </div>
                                        </a>
                                    @endif
                                    </a>
                                 
                                <div class="" id="reply-form-{{$reply->id}}" style="display:none">
                                     <form action="{{ url('comment/reply')}}" method="POST" class="form">
                                        @csrf
                                        <div class="row">
                                            @if (Auth::User())
                                            <div class="col-12">
                                                <input type="hidden" name="post_slug" value="{{ $post->slug }}">
                                                <input type="hidden" name="post_id"  value="{{ $post->id }}">
                                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                <textarea class="form-control mb-1" id="reply-form-{{$reply->id}}-text"
                                                    rows="4"  placeholder="Comment" name="message"></textarea>
                                            </div>
                                            @else
                                                <div class="col-12 mt-1">
                                                        <h6 class="section-label mt-25">Leave a Comment</h6>
                                                        <div class="card alert alert-danger" role="alert">
                                                            <div class="card-body">
                                                                <span>
                                                                        Please <a href=" {{ route('login')}} ">Login</a> First To  Leave a Comment
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            <div class="col-12 ">
                                                <button type="submit" class="btn btn-primary">Reply</button>
                                            </div>
                                        </div>
                                    </form>
                                  </div>
                                   
                                   


                                </div>
                            </div>
                    </div>
                </div>
            @endif
        @endforeach