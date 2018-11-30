@extends('admin.layouts.admin') @section('title',__('Sửa') )
<Style>
    .upload-img-btn {
        margin-top: 10px;
    }

    .hidden {
        display: none;
    }

    .color-green {
        color: green;
    }

    .radio-group {
        margin-top: 7px;
    }

    .radio-group label {
        margin-right: 10px;
    }

    .radio-group input[type="radio"] {
        margin-right: 5px;
    }
</Style>
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['admin.products.update', $product->id],'method' => 'put','class'=>'form-horizontal form-label-left']) }}
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">
                    Tiêu đề
                </label>
                <div class="col-md-10 col-sm-10 col-xs-12">
                    <input id="title" type="text"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('title')) parsley-error @endif"
                           name="title"
                           value="{{$product->title}}" required> @if($errors->has('title'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('title') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    Trạng thái
                </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="status" value="1" @if($product->status == 1 || empty($product->status)) checked @endif >
                            Công khai
                        </label>
                        <label>
                            <input type="radio" name="status" value="0" @if($product->status == 0) checked @endif >
                            Ẩn
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12 txt-align-left">
                    Link ảnh
                </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <input id="photo" type="text" name="photo" placeholder="Nhập link ảnh"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('title')) parsley-error @endif"
                           value="{{$product->photo}}" required/>
                </div>
                <div class="col-md-2 col-sm-2">
                    <a href="" class="btn btn-xs btn-default pull-right upload-img-btn" data-toggle="modal">
                        upload image
                    </a>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">
                    Nội dung
                </label>
                <div class="col-md-10 col-sm-10 col-xs-12">

                    <!-- Input to browse your machine and select image to upload -->
                    <input type="file" class="hidden" id="image-input" name="image"/>
                    <textarea id="content" name="editor"
                              class="ckeditor form-control col-md-7 col-xs-12 @if($errors->has('content')) parsley-error @endif"
                              rows="10" cols="50" required>{{$product->content}}</textarea>
                    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
                    <script>
                        CKEDITOR.replace('content');
                    </script>
                    @if($errors->has('content'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('content') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success"> Lưu</button>
                    <a class="btn btn-primary" href="{{ URL::previous() }}"> Hủy</a>
                </div>
            </div>
            {{ Form::close() }}
        </div>
        <!-- Pop-up Modal to display image URL -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Click below to copy image url</h4>
                    </div>
                    <div class="modal-body">
                        <!-- returned image url will be displayed here -->
                        <input type="text" id="post_image_url" onclick="return copyUrl()" class="form-control">
                        <p id="feedback_msg" class="hidden color-green">
                            <b>Image url copied to clipboard</b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/users/edit.css')) }}
@endsection
@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/users/edit.js')) }}
    {{ Html::script('js/upload-image.js')}}
@endsection