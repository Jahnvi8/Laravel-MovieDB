@extends('layouts.app')

@section('content')
<style>
   body{
      background: rgb(63,135,144);
background: linear-gradient(0deg, rgba(63,135,144,1) 28%, rgba(44,62,80,1) 83%);
   }
 .heading{
    color:white;
    text-transform:uppercase;
    font-size:2rem;
    font-weight:600;
    margin-left:1.5%;
    padding:4px;
 }
 .card-deco{
   width:15rem; 
   
     margin-bottom:20px;
       border-radius: 5px;
       background: rgb(46, 95, 128);
    background: linear-gradient(90deg, rgba(63, 95, 128, 0.9897001036742822) 7%, #18394e 87%);
    box-shadow: 4px 3px 8px 0 rgb(43, 41, 37);
    transition-duration: 0.3s;
      
 }

</style>
<h1 class="heading">All movies
   <a href="{{route('movies.create')}}" 
  
   >
   <!-- class="btn btn-primary btn-sm" -->
      <!-- <i class="fas fa-plus"></i> -->
   </a>
</h1>
<div class="container">
<div class="row ">
   @foreach ($movies as $movie)
   <div class="col-sm">
      <div class="card card-deco" >
         <img src="{{$movie->image}}" class="card-image-top">
         <div class="card-body">
            <h3><a href="{{route('movies.show',$movie->id)}}"   style="text-decoration:none;color:white;">
               {{$movie->title}}
           
            </a></h3> <div class="text-warning">
            @for($i=1;$i<=$movie->rating_star;$i++)
              <i class="fas fa-star"></i>
            @endfor
           
             
              
            </div>
            <p style="color:#9fc6cc;">{{Str::limit($movie->description,100)}}</p>
         </div>
      </div>
   </div>
   @endforeach
</div>
</div>
@endsection