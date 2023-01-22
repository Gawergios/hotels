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
                            <form action="{{url('updateh/'.$hotel->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- @method("put") --}}
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">{{__('message.arabic hotel name')}}</label>
                                            @error('name_ar')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <input type="text" name="name_ar" class="form-control"
                                                id="exampleInputEmail1" value="{{$hotel->name_ar}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">{{__('message.english hotel name')}}</label>
                                            @error('name_ar')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <input type="text" name="name_en" class="form-control" id="exampleInputEmail1" value="{{$hotel->name_en}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">{{__('message.stars')}}</label>
                                            @error('stars')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <input type="text" name="stars" class="form-control" id="exampleInputEmail1" value="{{$hotel->stars}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">{{__('message.arabic description')}}</label>
                                            @error('description_ar')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <input type="text" name="description_ar" class="form-control"
                                                id="exampleInputEmail1" value="{{$hotel->description_ar}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">{{__('message.english description')}}</label>
                                            @error('description_en')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <input type="text" name="description_en" class="form-control" id="exampleInputEmail1" value="{{$hotel->description_en}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">{{__('message.image')}}</label>
                                            <input type="file" name="image" class="form-control" id="exampleInputEmail1"
                                                placeholder="choose images">
                                            <img width="100px" height="100px" src="{{url('image/'.$hotel->image)}}">
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <input type="submit" value="{{__('message.save')}}" name="save" class="btn btn-primary">
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
