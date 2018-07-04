
@extends('layouts.app')
@section('content')
@include('toDo.partials.alert')
   
<div class="container">

    <div class="col-lg-6">
        
        <br>
        <br>
        <br>
        <br>
        <p><b>Show My Posts:</b></p>
        <a href="/profile" class="btn btn-info">Create Post</a>
        <br>
        <br>
        <p><b>Found Another:</b></p>
        <a href="/found/create" class="btn btn-info">Create Post</a>
        
        <br>
        <br>
        <p><b>Home Page:</b></p>       
        <a href="/" class="btn btn-info">check here</a>
     </div>      
   
    <div class="col-lg-6">
       <center><h2><b>Found_Products</b></h2></center>
       <br>
       <br>
       <ul class="list-group col-lg-10">
         @foreach($products as $item)
            <li style="margin:20">
           <p><b>{{ucfirst($item->name)}}</b> has found a <b>{{ucfirst($item->product_name)}}</b> </p>
           <p>catagory:{{ucfirst($item->catagory)}}</p>
           <p>Description:{{ucfirst($item->description)}}</p>
           <img src="/storage/{{$item->image}}" width="100px"/>
           <hr>
           </li>
         @endforeach 
       </ul>

     
   
</div>  
@endsection
