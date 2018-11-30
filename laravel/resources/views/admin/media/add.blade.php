@extends('admin.layouts.admin')
@section('title', __('views.admin.media.add.title'))
@section('content')
    <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-12">
            @if (isset($errorMessage))
                <div class="alert alert-danger">
                    {{$errorMessage}}
                </div>
            @endif
            {{Form::open(['route' => ['admin.media.add'], 'method' => 'post', 'files' => true])}}
            <div class="row">
                <div class="col-xs-6 col-xs-offset-2">
                    <div class="form-group">
                        <label for="name">{{__('views.admin.media.add.name')}}</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="{{__('views.admin.media.add.name.placeholder')}}">
                    </div>
                    <div class="form-group">
                        <label for="file">{{__('views.admin.media.add.file')}}</label>
                        <input class="form-control" type="file" name="file" id="file">
                    </div>
                    <div class="form-group">
                        <label for="description">{{__('views.admin.media.add.description')}}</label>
                        <textarea class="form-control" name="description" id="description"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="{{__('views.admin.media.add.submit')}}">
                        <input type="button" class="btn btn-default" value="{{__('views.admin.media.add.back')}}" onclick="history.back()">
                    </div>
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>
@endsection