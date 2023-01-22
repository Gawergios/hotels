@extends('dashboard.layout')

@section('content')


<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-body">
                            <form action="{{url('editroom/'.$room->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">hotel id</label>
                                            @error('hotel_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <input type="text" name="hotel_id" class="form-control" id="exampleInputEmail1" value="{{$room->hotel_id}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">room code</label>
                                            @error('code')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <input type="text" name="code" class="form-control" id="exampleInputEmail1" value="{{$room->code}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">net price</label>
                                            @error('net_price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <input type="number" name="net_price" class="form-control" id="exampleInputEmail1" value="{{$room->net_price}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">taxes</label>
                                            @error('taxes')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            @error('taxes_type')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <input type="text" name="taxes" class="form-control" id="exampleInputEmail1" value="{{$room->taxes}}">
                                            <input type="text" name="taxes_type" class="form-control" id="exampleInputEmail1" value="{{$room->taxes_type}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">currency</label>
                                            @error('currency')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <input type="text" name="currency" class="form-control" id="exampleInputEmail1" value="{{$room->currency}}">
                                        </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">room image</label>
                                        <input type="file" name="image" class="form-control" id="exampleInputEmail1" placeholder="choose images">
                                        <img width="100px" height="100px" src="{{url('image/'.$room->image)}}">
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button class="btn btn-primary">{{__('message.save')}}</button>
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