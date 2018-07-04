<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\lost_found;

class toDoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modell= DB::table('lost_founds')
            ->join('users', 'users.id', '=', 'lost_founds.user_id')
            ->select('users.*', 'lost_founds.*')
            ->get();
        
        return view('toDo.home',compact('modell'));
    }

    public function foundProducts() 
    {
        $products= DB::table('lost_founds')
            ->join('users', 'users.id', '=', 'lost_founds.user_id')
            ->select('users.*', 'lost_founds.*')
            ->where('lost_founds.status', 0)
            ->get();
        
        return view('toDo.found',compact('products'));
    }

    public function lostProducts() 
    {
        $products= DB::table('lost_founds')
            ->join('users', 'users.id', '=', 'lost_founds.user_id')
            ->select('users.*', 'lost_founds.*')
            ->where('lost_founds.status', 1)
            ->get();
        
        return view('toDo.lost',compact('products'));
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
        $modell=new lost_found;

        if($request->hasFile('file'))
        
        {
            $image=$request->file->getClientOriginalName();
            //$fileSize=$request->file->getClientSize();
            $request->file->storeAs('public/uploads',$image);
            
            
             //$request->image->path();
             $modell->image=$image;
             //$todo->path=$filePath;
             //$todo->save();
        }
        else{
            return 'No file selected';
        }
        
        $this->validate($request,[
            'location'=>'required',
            'description'=>'required',
            'product_name'=>'required',
            
        ]);
        $modell->product_name=$request->product_name;
        $modell->catagory=$request->catagory;
        $modell->description=$request->description;
        $modell->location=$request->location;

        $modell->save();
        
    
       
        return redirect('/');
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
        return view('toDo.home',compact('item'));
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
        return view('toDo.edit',compact('item'));
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
         //session()->flash('message','Deleted Successfully');
         return redirect('/profile');
    }
}
