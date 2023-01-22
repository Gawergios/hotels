@extends('dashboard.layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif

            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-body">
                            <form action="{{url('addroom/img')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">room id</label>
                                        <input type="number" name="room_id" class="form-control"
                                            id="exampleInputEmail1" placeholder="room id">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">room image</label>
                                        <input type="file" name="room_img" class="form-control" id="exampleInputEmail1"
                                            placeholder="choose images">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" value="save" name="save" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>




@endsection