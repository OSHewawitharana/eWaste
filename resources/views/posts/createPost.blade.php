@include('layouts.main')


@yield('body')
<div class="col-lg-12">
  <div class="row">
   <div class="col-lg-3"></div>
   <div class="col-lg-6">
    <h1 class="text-center">Edit a User</h1><br>
  
    <div class="card">
     <div class="card-body">
         {!! Form::open(['action' => ['PostsController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
         <div class="form-group">
             {{ Form::label('title', 'Title', ['class' => 'form-label'] )}}
             {{ Form::text('title', 'title' , ['class' => 'form-control', 'placeholder' => 'Name of the waste', 'id' => 'name']) }}
         </div>



         <div class="form-group">
             {{ Form::label('description', 'Description', ['class' => 'form-label'] )}}
             {{ Form::text('description', 'description' , ['class' => 'form-control', 'placeholder' => 'Give a brief description', 'id' => 'name']) }}
         </div>

         


<div class="form-group">
  {!! Form::Label('catgeory', 'category:') !!}
<select class="form-control" name="item_id">
<option value="<select>" disabled selected >select</option>
    @foreach($cat as $category)
      <option value="{{$category->category}}">{{$category->category}}</option>
 
    
    
    @endforeach
  </select>
  </div>
 
       <div class="row" style="margin-left: -5px;">
                     <div style="float: left;">
                         {{ Form::hidden('_method', 'PUT')}}
                         {{ Form::submit('Save changes', ['class' => 'btn btn-success btn-md']) }}
                         {!! Form::close() !!}
                     </div>
                     <div style="float: right;">
                         
                     </div>
                  </div>   
     </div>
    </div>
   </div>
   <div class="col-lg-3"></div>
  </div>
 </div>



<div class="form-group">


</div>