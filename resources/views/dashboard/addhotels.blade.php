@extends('dashboard.layout')


@section('content')

{{-- validation errors --}}


<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">


            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif


            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-body">
                            <form action="{{url('posthotel')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{__('message.arabic hotel name')}}</label>
                                        <input type="text" name="name_ar" class="form-control" id="exampleInputEmail1" placeholder="{{__('message.arabic hotel name')}}">
                                        @error('name_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{__('message.english hotel name')}}</label>
                                        <input type="text" name="name_en" class="form-control" id="exampleInputEmail1" placeholder='{{__("message.arabic hotel name")}}'>
                                        @error('name_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">{{__('message.stars')}}</label>
                                        <input type="text" name="stars" class="form-control" id="exampleInputEmail1" placeholder="{{__('message.stars')}}">
                                        @error('stars')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">{{__('message.arabic description')}}</label>
                                        <textarea name="description_ar" class="form-control" id="exampleInputEmail1" placeholder="{{__('message.arabic description')}}"></textarea>
                                        @error('description_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">{{__('message.english description')}}</label>
                                        <textarea name="description_en" class="form-control" id="exampleInputEmail1" placeholder="{{__('message.english description')}}"></textarea>
                                        @error('description_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">{{__('message.image')}}</label>
                                        <input type="file" name="image" class="form-control" id="exampleInputEmail1" >
                                        @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <input type="submit" value="{{__('message.save')}}" name="{{__('message.save')}}" class="btn btn-primary">
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


