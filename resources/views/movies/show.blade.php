@extends('layouts.app')

@section('content')
<style>
   body{
      background: rgb(63,135,144);
background: linear-gradient(0deg, rgba(63,135,144,1) 28%, rgba(44,62,80,1) 83%);
   }
   .deco{
     width:55rem;
     margin:10%;
     /* position: absolute; */
     
   }
</style>
  <div class="card my-5 deco" >
      <img class="card-image-top" src="{{$movie->image}}" alt="">
      <div class="card-body"
      
      >
          <h1>{{$movie->title}}</h1>
          <div class="text-warning">
          @for($i=1;$i<=$movie->rating_star;$i++)
  <i class="fas fa-star"></i>
            @endfor
            </div>
          <p>{{$movie->description}}</p>

          <h3>Cast
          <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
  <i class="fas fa-plus "></i>
</button>
          </h3>
          <ul class="list-group list-group-flush">
              @if(count($movie->casts))
              @foreach($movie->casts as $cast)
              <li class="list-group-item">{{$cast->name}} - 
                  <span class="text-muted font-italic">{{$cast->pivot->role}}</span>
                  <form method="post" action="{{route('movie_cast_destroy',[$movie->id,$cast->id])}}">
                    @csrf
                    @method('delete')
                  <button class="btn btn-link text-danger float-end" 
                  style="text-decoration:none;"
                  type="submit">DELETE</button>
              </form>
              </li>
              @endforeach
              @endif
             
          </ul>

          
</ul>
         
      </div>
      <div class="card-footer">
          <form action="{{route('movies.destroy',$movie->id)}}" method="POST">
            @csrf
            @method('delete')
              <button type="submit" class="btn btn-danger float-end">Delete</button>
          </form>
          
      </div>
  </div>

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Casts</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row " 

        >
            <div class="col-md-6 " >
                <h3>Cast Role</h3>
                <form action="{{route('movie_cast_store',$movie->id)}}" method="POST">
                    @csrf
                    <div class="form-group ">
                        <label for="">Actor Name</label>
                        <select name="cast_movie_name" class="form-control">
                        <option value="" disabled selected>Choose Cast</option>
                        @if(count($casts))
                          @foreach($casts as $cast)
                          <option value="{{$cast->id}}">{{$cast->name}}</option>
                          @endforeach
                        @endif  
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="">Role</label>
                        <input type="text" class="form-control" name="cast_movie_role">
                        </div>
                        <button class="btn btn-primary float-end" type="submit">Submit</button>
                </form>
            </div>
            <div class="col-md-6">
                <h3>New Cast</h3>
                <form action="{{route('casts.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                    <label for="">Actor Name</label>
                        <input type="text" class="form-control" name="cast_name">
                        </div>
                    <div class="form-group">
                    <label for="">Actor Image</label>
                        <input type="text" class="form-control" name="cast_image">
                        </div>
                        <button class="btn btn-primary float-end" type="submit">Submit</button> 
                </form>
            </div>
        </div>
      </div>
     
    </div>
  </div>
</div>
@endsection