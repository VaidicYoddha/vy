<?php

namespace App\Http\Controllers\Home;

use App\Models\blog\Post;
use App\Models\blog\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
       if (Auth::check()) 
       {
          $validator = Validator::make($request->all(),[
            'message' => 'required|string'
          ]);
          if ($validator->fails())
           {
             
             return redirect()->back()->with('success','Comment area is mandetory');
          }
           $post = Post::where('slug', $request->post_slug)->first();
           if ($post)
            {
              Comment::create([
                'post_id'=> $post->id,
                'user_id' => Auth::user()->id,
                'message' => $request->message
              ]);
                return redirect()->back()->with('success','The Comment Pending for Approval');
           }
           else
            {
               return redirect()->back()->with('success','No such Post found');
             }
       }
       else {
          return redirect('login')->with('success','Login first to Comment');
       }

        // Success message
        
    }

    public function replystore(Request $request)
    {
      if (Auth::check()) 
       {
         $validator = Validator::make($request->all(),[
            'message' => 'required|string'
          ]);
          if ($validator->fails())
           {
             
             return redirect()->back()->with('success','Comment area is mandetory');
          }
           $post = Post::where('slug', $request->post_slug)->first();
          if ($post)
           {
              // Comment::create([
              //   'post_id'=> $post->id,
              //   'user_id' => Auth::user()->id,
              //   'parent_id'=> $post->comments->id,
              //   'message' => $request->message
              // ]);

                $comment = new Comment;;
                $comment->post_id = $request->input('post_id');
                $comment->user_id = Auth::id(); 
                $comment->parent_id = $request->input('parent_id');
                $comment->message = $request->input('message');
                $comment->save();     

              return redirect()->back()->with('success','The Reply Pending for Approval');

          }
           else
            {
               return redirect()->back()->with('success','No such Comment found');
             }
      
       }
       
       else {
          return redirect('login')->with('success','Login first to Comment');
       }


    }

    public function destroy($comment_id)
    {
        $comment = Comment::find($comment_id);
           if ($comment) 
        {           
            $comment->delete();
            return redirect()->back()->with('success', 'Deleted Successfully.');
        }
        else {
        
            return redirect()->back()->with('success', 'No Comment ID Found.');
        
        }
        
        
         
    }
       
}

