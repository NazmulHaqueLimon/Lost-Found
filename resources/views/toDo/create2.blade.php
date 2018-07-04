@extends('layouts.app')
@section('content')
   
@include('toDo.partials.errors')

<div class="container">
    <form class="form-horizontal" action="/found" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <fieldset>
    <legend>Create Post</legend>


    
    <div class="form-group">
      <label for="input" class="col-lg-2 control-label">Product_Name</label>
      <div class="col-lg-3">
        <input type="text" class="form-control" name="product_name" id="inputName" placeholder="type the product name">
      </div>
    </div>
   
    

    <div class="form-group">
      <label for="textarea" class="col-lg-2 control-label">Location</label>
      <div class="col-lg-5">
        <textarea class="form-control" rows="3" name="location" id="location" placeholder="location where you have lost or found that product"></textarea>
        <span class="help-block">Try to mention the room number,building number,or nearest identifing location of your campus </span>
      </div>
    </div>

    <div class="form-group">
      <label for="textarea" class="col-lg-2 control-label">Product_Description</label>
      <div class="col-lg-5">
        <textarea class="form-control" rows="3" name="description" id="description" placeholder="write a short description"></textarea>
        <span class="help-block">please write specifiq informations that helps to identify the Lost product</span>
      </div>
    </div>

    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Select_Catagory</label>
      <div class="col-lg-5">
        <select class="form-control" name="catagory" id="select">
          <option>Electronics</option>
          <option>purse</option>
          <option>id_card</option>
          <option>Money</option>
          <option>Study_metarials</option>
          <option>Others</option>
        </select>
        <br>
        
      </div>
    </div>


    
    
       <div class="form-group">
         <label for="input" class="col-lg-2 control-label">Upload Image(optional)</label>
         <div class="col-lg-5">
           <input type="file" name="file" class="form-control" id="inputFile" placeholder="upload product photo">
           
         </div>
       </div>
    
    

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>

  </fieldset>
</form>
</div>


@endsection
