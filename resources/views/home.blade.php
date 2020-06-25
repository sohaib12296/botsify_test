@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form action="{{ route("upload") }}" method="POST" enctype="multipart/form-data">    
        @csrf
                <input type="file" name ="file_image" class="form-control" placeholder="Image" required accept="image/x-png,image/gif,image/jpeg">
                <input type="submit" value="Submit"/>
        </form>
                    <br>
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
