<?php

namespace App\Http\Controllers;
use DB;
use App\waste;
use App\posts;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('posts.addPosts');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $waste = new Waste();
       $cat=DB::table('waste')->select('category')->distinct()->get();
   
        return view('posts.create',compact('cat'));

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
if($request->hasFile('attachment')){
    $fileNameWithExt = $request->file('attachment')->getClientOriginalName();
    $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get extension
            $extension = $request->file('attachment')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // upload
            $path = $request->file('attachment')->storeAs('public/attachment', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        
}



        $waste = new Waste;
        $category= $request->input('category');
        $wasteid = DB::table('waste')->select('id')->where('category',$category)->get();

         $post = new posts;

         

        $post->title = $request->input('title');
        $post->content  = $request->input('description');
        $post->attachment = $fileNameToStore;
        foreach($wasteid as $id)
       
        $post->waste_id = $id->id;
        $post->publisher_id = auth()->user()->id;
        $post->save();

      
        return redirect()->to('posts')->with()->message('success','Successfully posted.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
