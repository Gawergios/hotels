@extends('layout')

@section('content')

<div class="content-wrapper">
<section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Default box -->
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{url('/addrooms')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">hotel id</label>
                                                    <input type="number" name="hotel_id" class="form-control" id="exampleInputEmail1"
                                                        placeholder="hotel id">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">room code</label>
                                                    <input type="text" name="code" class="form-control" id="exampleInputEmail1"
                                                        placeholder="room code">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">net price</label>
                                                    <input type="number" name="net_price" class="form-control"
                                                        id="exampleInputEmail1" placeholder="net price">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">taxes </label>
                                                    <input type="number" name="taxes" class="form-control" id="exampleInputEmail1"
                                                        placeholder="amount">
                                                    <input type="text" name="taxes_type" class="form-control" id="exampleInputEmail1"
                                                        placeholder="type">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">total price </label>
                                                    <input type="number" name="total" class="form-control" id="exampleInputEmail1" placeholder="total">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">currency </label>
                                                    <input type="text" name="currency" class="form-control" id="exampleInputEmail1" placeholder="currency">
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
                        </div>
                    </div>
                </div>
            </section>
    <!-- /.content -->
</div>


@endsection
