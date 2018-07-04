<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\lost_found;
use Illuminate\Support\Facades\Auth;

class foundController extends Controller
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
        return view('toDo.create2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $foundModell=new lost_found;

        if($request->hasFile('file'))
        
        {
            $image=$request->file->getClientOriginalName();
            //$fileSize=$request->file->getClientSize();
            $request->file->storeAs('public/uploads',$image);
            
            
             //$request->image->path();
             $foundModell->image=$image;
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
        $foundModell->product_name=$request->product_name;
        $foundModell->catagory=$request->catagory;
        $foundModell->description=$request->description;
        $foundModell->location=$request->location;
        $foundModell->status=0;
        $foundModell->user_id =$request->user()->id;

        $foundModell->save();
        
    
       
        return redirect('/profile');
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
