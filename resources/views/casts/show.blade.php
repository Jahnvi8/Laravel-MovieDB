@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-image-top">
        <div class="card-body">
            <h1>Tony Stark</h1>
            <p>all</p>
            <ul class="list-group list-group-flush">
                <l1 class="list-group-item">
                    <a href="#">Avengers</a>
                </l1>
            </ul>
        </div>
        <div class="card-footer">
            <form action="#" method="POST">
                <button type="submit" class="btn btn-danger float-end">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection