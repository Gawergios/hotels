@extends('layout')




@section('content')


<div class="content-wrapper">


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Default box -->
                            <div class="card">

                                <div class="card-body">
                                    <form action="{{url('/addhotels')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">hotel name</label>
                                                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                                    placeholder="hotel name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">stars</label>
                                                <input type="text" name="stars" class="form-control" id="exampleInputEmail1"
                                                    placeholder="stars">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">description</label>
                                                <textarea name="description" class="form-control" id="exampleInputEmail1" placeholder="description"></textarea>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <input type="submit" value="save" name="save" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>



@endsection
