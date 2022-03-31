@extends('layouts.app')

@section('content')
<style>
     body{
       
        background:  rgb(31,70,97);
/* background: linear-gradient(4deg, rgba(63,135,144,1) 28%, rgba(44,62,80,0.9968602825745683) 83%); */
}
</style>

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card "
            style="
             border-radius: 5px;
       background: rgb(46, 95, 128);
    background: linear-gradient(90deg, rgba(63, 95, 128, 0.9897001036742822) 7%, #18394e 87%);
    box-shadow: 4px 3px 8px 0 rgb(43, 41, 37);
            ">
                <div class="card-header "
                style="font-size:30px;
                font-weight:500;
                color:#9fc6cc;"
                >WELCOME   {{ Auth::user()->name }}</div>

                <div class="card-body"
                style="color:#9fc6cc;
                font-size:20px;"
                >
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
               
                  
                </div>
                <div class="card-footer">
                      <a class="navbar-brand" href="{{ url('/') }}"
                      style="
                      font-size:20px;
                      color:whitesmoke;
                      "
                      >
                    <!-- {{ config('app.name', 'MovieDB') }} -->
                    Visit the database
                </a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
