@extends('dashboard.layout')

@section('content')

<div class="content-wrapper">
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
                                    <form action="{{url('postroom')}}" method="POST" enctype="multipart/form-data">
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
                                                    <label for="exampleInputEmail1">currency </label>
                                                    <input type="text" name="currency" class="form-control" id="exampleInputEmail1" placeholder="currency">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">home image</label>
                                                    <input type="file" name="image" class="form-control" id="exampleInputEmail1" placeholder="choose images">
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
