<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\lost_found;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
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
        $id = Auth::id();
        $products = DB::table('lost_founds')->where('user_id', $id)->get();
        
        return view('toDo.profile',compact('products'));
    }
    public function destroy($id)
    {
        //$item=lost_found::find($id);
         //$item->delete();
         //session()->flash('message','Deleted Successfully');
         //return redirect('/profile');

        // $item = Item::findOrFail($id);
        // $item->delete();

        // return Redirect::route('items.index');
         //$item = lost_found::findOrFail($id);
        // $item->delete();

        // return Redirect::route('profileController.index');
    }
}
