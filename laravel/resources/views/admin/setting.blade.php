@extends('admin.layouts.admin')
<Style>

</Style>
@section('title',__('Cài đặt') )

@section('content')
    <style>
        .img {
            height: 100px;
            width: auto;
            max-width: 150px;
        }
    </style>
    <br>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['admin.setting.update'],'method' => 'put','class'=>'form-horizontal form-label-left']) }}

            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    Page title
                </label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <input id="title" type="text" class="form-control col-md-7 col-xs-12
                           @if($errors->has('title')) parsley-error @endif" name="title"
                           placeholder="Page title" value="{{ $settings['title']->value }}" required>
                    @if($errors->has('title'))
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
                    Description 
                </label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                           <textarea placeholder="Description" name="description" rows="4" cols="50" class="form-control col-md-7 col-xs-12
                           @if($errors->has('description')) parsley-error @endif">{{ $settings['description']->value }}</textarea>
                    @if($errors->has('description'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('description') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    Keywords 
                </label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                           <textarea placeholder="Keywords" name="keywords" rows="4" cols="50" class="form-control col-md-7 col-xs-12
                           @if($errors->has('keywords')) parsley-error @endif">{{ $settings['keywords']->value }}</textarea>
                    @if($errors->has('keywords'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('keywords') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    Hotline
                </label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <input id="googleMap" type="text" class="form-control col-md-7 col-xs-12
                           @if($errors->has('hotline')) parsley-error @endif" name="hotline"
                           placeholder="Nhập số đường dây nóng" value="{{ $settings['hotline']->value }}" required>
                    @if($errors->has('hotline'))
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
                    Số di động
                </label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <input id="googleMap" type="text" class="form-control col-md-7 col-xs-12
                           @if($errors->has('tele_sale')) parsley-error @endif" name="tele_sale"
                           placeholder="Nhập số tư vấn viên" value="{{ $settings['tele_sale']->value }}" required>
                    @if($errors->has('tele_sale'))
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
                    Email
                </label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <input id="googleMap" type="text" class="form-control col-md-7 col-xs-12
                           @if($errors->has('email')) parsley-error @endif" name="email"
                           placeholder="Nhập email" value="{{ $settings['email']->value }}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    Địa chỉ
                </label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <input id="googleMap" type="text" class="form-control col-md-7 col-xs-12
                           @if($errors->has('address')) parsley-error @endif" name="address"
                           placeholder="Nhập địa chỉ" value="{{ $settings['address']->value }}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    Giới thiệu
                </label>
                <div class="col-md-10 col-sm-10 col-xs-12">
                    <textarea id="contents"
                              class=" form-control col-md-7 col-xs-12 ckeditor @if($errors->has('intro_article')) parsley-error @endif"
                              name="intro_article" rows="10" cols="50" required>
                        {{ $settings['intro_article']->value }}
                    </textarea>
                    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
                    <script>
                        CKEDITOR.replace('contents');
                    </script>
                    @if($errors->has('introduce'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('introduce') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    Liên hệ
                </label>
                <div class="col-md-10 col-sm-10 col-xs-12">
                    <textarea id="contact"
                              class=" form-control col-md-7 col-xs-12 ckeditor @if($errors->has('contents')) parsley-error @endif"
                              name="contact" rows="10" cols="50" required>
                        {{ $settings['contact']->value }}
                    </textarea>
                    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
                    <script>
                        CKEDITOR.replace('contact');
                    </script>
                    @if($errors->has('contact'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('contact') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    Ảnh bìa
                </label>
                <div class="col-md-10 col-sm-10 col-xs-12">
                    <input type="hidden" name="featured_content" id="featured_content"
                           value="{{$settings['featured_content']->value}}">
                    <div class="row" id="featured_content_preview">
                        @if($settings['featured_content']->value != '')
                            @foreach(explode('|', $settings['featured_content']->value) as $value)
                                <div class="col-xs-3">
                                    <img src="{{$value}}" class="img" style="margin-bottom: 15px;">
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <input type="button" class="btn btn-default" value="Chọn ảnh" onclick="selectImage()"><br>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    Logo sản phẩm
                </label>
                <div class="col-md-10 col-sm-10 col-xs-12">
                    <input type="hidden" name="product_logo" id="product_logo"
                           value="{{$settings['product_logo']->value}}">
                    <div class="row" id="product_logo_preview">
                        @if($settings['product_logo']->value != '')
                            @foreach(explode('|', $settings['product_logo']->value) as $value)
                                <div class="col-xs-3">
                                    <img src="{{$value}}" class="img" style="margin-bottom: 15px;">
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <input type="button" class="btn btn-default" value="Chọn ảnh" onclick="selectLogoImage()"><br>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    Footer
                </label>
                <div class="col-md-10 col-sm-10 col-xs-12">
                <textarea id="contentsFooter" name="contentsFooter" rows="10" cols="50" required
                          class=" form-control col-md-7 col-xs-12 ckeditor
                                @if($errors->has('contentsFooter')) parsley-error @endif">
                    {{ $settings['footer_contact']->value }}
                </textarea>
                    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
                    <script>
                        CKEDITOR.replace('contentsFooter');
                    </script>
                    @if($errors->has('contentsFooter'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('contents-new') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    Google Map
                </label>
                <div class="col-md-10 col-sm-10 col-xs-12">
                    <input id="googleMap" type="text" class="form-control col-md-7 col-xs-12
                           @if($errors->has('title')) parsley-error @endif" name="googleMap"
                           placeholder="Nhập url" value="{{ $settings['footer_ggmap']->value }}" required>
                    @if($errors->has('title'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('title') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success"> Cập Nhật</button>
                    <a class="btn btn-primary" href="{{ URL::previous() }}"> Hủy</a>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>

    <div id="image-modal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    Chọn ảnh
                    <div class="pull-right" style="display: inline">
                        <button type="button" class="btn btn-default" onclick="clearSelection()">Xóa hết lựa chọn</button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row text-center" id="image-container">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="updateFeaturedContentList()">Lưu</button>
                    <button type="button" class="btn btn-default" onclick="closeModal()">Hủy</button>
                </div>
            </div>
        </div>
    </div>

    <div id="logo-image-modal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    Chọn ảnh
                    <div class="pull-right" style="display: inline">
                        <button type="button" class="btn btn-default" onclick="clearSelection()">Xóa hết lựa chọn</button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row text-center" id="logo-image-container">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="updateProductLogoList()">Lưu</button>
                    <button type="button" class="btn btn-default" onclick="closeModal()">Hủy</button>
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
    <script>
        var totalSelected = 0;
        var selectImage = function () {
            var currentSelection = $('#featured_content').val().split('|');
            $.get(
                '{{route('admin.media.list')}}', {},
                function (e) {
                    var images = JSON.parse(e);
                    images.forEach(function (image) {
                        $('#image-container').append(
                            $('<div>').addClass('col-xs-3 text-center').css('margin-bottom', '15px')
                                .append(
                                    $('<img>').attr('src', image).addClass('img')
                                        .css({
                                            'display': 'block',
                                            'margin': '0 auto'
                                        })
                                ).append(
                                $('<input>').attr('type', 'checkbox')
                                    .attr('data-src', image)
                                    .attr('onclick', 'toggleSelection(this)')
                                    .addClass('image-checkbox')
                                    .prop('checked', (currentSelection.indexOf(image) !== -1))
                            )
                        );
                    });
                    $('#image-modal').modal('show');
                }
            );
        };
        var selectLogoImage = function () {
            var currentSelection = $('#product_logo').val().split('|');
            $.get(
                '{{route('admin.media.list')}}', {},
                function (e) {
                    var images = JSON.parse(e);
                    images.forEach(function (image) {
                        $('#logo-image-container').append(
                            $('<div>').addClass('col-xs-3 text-center').css('margin-bottom', '15px')
                                .append(
                                    $('<img>').attr('src', image).addClass('img')
                                        .css({
                                            'display': 'block',
                                            'margin': '0 auto'
                                        })
                                ).append(
                                $('<input>').attr('type', 'checkbox')
                                    .attr('data-src', image)
                                    .attr('onclick', 'toggleSelection(this)')
                                    .addClass('image-checkbox')
                                    .prop('checked', (currentSelection.indexOf(image) !== -1))
                            )
                        );
                    });
                    $('#logo-image-modal').modal('show');
                }
            );
        };

        var toggleSelection = function (checkbox) {
            if (checkbox.checked)
                checkbox.setAttribute('data-index', totalSelected++);
            else {
                checkbox.removeAttribute('data-index');
                totalSelected--;
            }
        };

        var updateFeaturedContentList = function () {
            var selectedItems = [];
            $('input.image-checkbox[type=checkbox]:checked')
                .each(function (key, value) {
                    var index = $(value).attr('data-index');
                    selectedItems.push({
                        'src': $(value).attr('data-src'),
                        'index': (typeof index !== 'undefined') ? index : 0
                    })
                });
            selectedItems.sort(selectedItemSorter);
            var featuredContent = [];
            selectedItems.forEach(function (e) {
                featuredContent.push(e.src);
            });
            $('#featured_content').val(featuredContent.join('|'));
            $('#featured_content_preview').html('');
            featuredContent.forEach(function (e) {
                $('#featured_content_preview').append(
                    $('<div>').addClass('col-xs-3')
                        .append(
                            $('<img>').attr('src', e).addClass('img')
                                .css({
                                    'display': 'block',
                                    'margin-bottom': '15px'
                                })
                        )
                )
            });

            closeModal();
        };

        var updateProductLogoList = function () {
            var selectedItems = [];
            $('input.image-checkbox[type=checkbox]:checked')
                .each(function (key, value) {
                    var index = $(value).attr('data-index');
                    selectedItems.push({
                        'src': $(value).attr('data-src'),
                        'index': (typeof index !== 'undefined') ? index : 0
                    })
                });
            selectedItems.sort(selectedItemSorter);
            var featuredContent = [];
            selectedItems.forEach(function (e) {
                featuredContent.push(e.src);
            });
            $('#product_logo').val(featuredContent.join('|'));
            $('#product_logo_preview').html('');
            featuredContent.forEach(function (e) {
                $('#product_logo_preview').append(
                    $('<div>').addClass('col-xs-3')
                        .append(
                            $('<img>').attr('src', e).addClass('img')
                                .css({
                                    'display': 'block',
                                    'margin-bottom': '15px'
                                })
                        )
                )
            });

            closeModal();
        };

        var closeModal = function () {
            $('#image-container').html('');
            $('#logo-image-container').html('');
            $('#image-modal').modal('hide');
            $('#logo-image-modal').modal('hide');
        };

        var selectedItemSorter = function (a, b) {
            if (a.index > b.index) return 1;
            else return -1;
        }

        var clearSelection = function () {
            $('input.image-checkbox').prop('checked', false);
        }
    </script>
@endsection







































