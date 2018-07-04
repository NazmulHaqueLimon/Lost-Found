
@extends('layouts.app')
@section('content')
@include('toDo.partials.alert')
   
<div class="container">  

    <div class="col-lg-6">
        
        <br>
        <br>
        <br>
        <br>
        <p><b>Found Something?</b></p>
        <a href="/found/create" class="btn btn-info">Create Post</a>
        <br>
        <br>
        <br>
        <p><b>Show All Found Products</b></p>
        <a href="/foundProducts" class="btn btn-info">Display Losts</a>
         <br>
        <br>
        <br>        
        <p><b>Lost Something?</b></p>
        <a href="/lost/create" class="btn btn-info">Create Post</a>
        <br>
        <br>
        <br>
        <p><b>Show All Lost Products</b></p>
        <a href="/lostProducts" class="btn btn-info">Display Founds</a>
     </div>  
   
    <div class="col-lg-6">
       <h2><b>My_Posts</b></h2>
       <br>
       <br>
       <ul class="list-group col-lg-10">
         @foreach($products as $item)
         <li style="margin:20">
           <img src="/storage/{{$item->image}}" width="100px"/>
           <p><b>Product_Name <b>{{ucfirst($item->product_name)}}</b> </p>
           <p>Catagory:{{ucfirst($item->catagory)}}</p>
           <p>Location:{{ucfirst($item->location)}}</p>
           <p>Description:{{ucfirst($item->description)}}</p>
            

           <br>
           <hr>
           <br>
           <br>
        </li>
         @endforeach 
       </ul>

     

    
   
</div>  
@endsection
