<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\lost_found;
use Illuminate\Support\Facades\Auth;

class lostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lostModell=lost_found::all();
        
        return view('toDo.home',compact('lostModell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('toDo.create');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lostModell=new lost_found;

        if($request->hasFile('file'))
        
        {
            $image=$request->file->getClientOriginalName();
            //$fileSize=$request->file->getClientSize();
            $request->file->storeAs('public/uploads',$image);
            
            
             //$request->image->path();
             $lostModell->image=$image;
             //$todo->path=$filePath;
             //$todo->save();
        }
        else{
            $lostModell->image="";
        }
        
        $this->validate($request,[
            'location'=>'required',
            'description'=>'required',
            'product_name'=>'required',
            
        ]);
        $lostModell->product_name=$request->product_name;
        $lostModell->catagory=$request->catagory;
        $lostModell->description=$request->description;
        $lostModell->location=$request->location;
        $lostModell->status=1;
        $lostModell->user_id =$request->user()->id;

        $lostModell->save();
        
    
       
        return redirect('/profile');
        //return view('toDo.home',compact('modell'));
    }

/*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $item=lost_found::find($id);
        return view('toDo.lost',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=lost_found::find($id);
        return view('toDo.lost',compact('item'));
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
        $modell=lost_found::find($id);
        $modell->validate($request,[
            'body'=>'required',
            'title'=>'required'
        ]);
        $modell->body=$request->body;
        $modell->title=$request->title;
        $modell->save();
        session()->flash('message','Updated Successfully');
        return redirect('/toDo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $item=lost_found::find($id);
         $item->delete();
         session()->flash('message','Deleted Successfully');
         return redirect('/');
    }
}
