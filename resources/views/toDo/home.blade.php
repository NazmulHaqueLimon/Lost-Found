@extends('layouts.app')
@section('content')
@include('toDo.partials.alert')
   
<div class="container">   
   
   

     <div class="col-lg-4">
        <br>
        <br>
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
        <a href="/foundProducts" class="btn btn-info">Display Founds</a>
           
     </div>
     <div class="col-lg-4">
         <br>
        <br>
        <br>
        <br>
        <br>
        <br>       
        <p><b>Lost Something?</b></p>
        <a href="/lost/create" class="btn btn-info">Create Post</a>
        <br>
        <br>
        <br>
        <p><b>Show All Lost Products</b></p>
        <a href="/lostProducts" class="btn btn-info">Display Losts</a>
     </div> 
      <div class="col-lg-4">       
        <h2><b>BRACU_Lost_And_Found Key_Features:</b></h2>
        <br>
        <br>
        <p> 
          @- Students Can find their lost products easily from hare.Person who finds anything in the campus,<br><br>
          @- can post hare with the product photo and other required information to find the owner.<br><br>
          @- The person who lost something also can post with the specifiq information and a photo.<br><br>
          @- Providing his/her contact information they can communicate with each other to hand over the product.<br><br>
          @- It can be called an easy way to find lost product,we can also call it the Virtual Lost And Found Box.<br><br>

        </p>
     </div> 
   
</div>  
@endsection