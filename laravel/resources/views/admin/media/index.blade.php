@extends('admin.layouts.admin')
@section('title', __('views.admin.media.index.title'))
@section('content')
    <style>
        .img-container {
            margin-bottom: 20px;
            padding: 2px;
        }

        .card {
            background-color: #dddddd;
            padding: 10px;
            height: 275px;
        }

        .img-container .thumbnail {
            height: 100px;
            width: auto;
            max-width: 150px;
        }

        .media {
            width: 100%;
            height: auto;
        }

        .media-file-name {
            width: 11em;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
    </style>
    <div class="pull-right">
        <a href="{{route('admin.media.add')}}" class="btn btn-primary">
            {{__('views.admin.media.index.add_media')}}
        </a>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            @if (Session::has('error_message'))
                <div class="alert alert-warning">
                    {{Session::get('error_message')}}
                </div>
            @endif
            @if (Session::has('success_message'))
                <div class="alert alert-success">
                    {{Session::get('success_message')}}
                </div>
            @endif
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{__('views.admin.media.index.filter.label')}}
                    </div>
                    <div class="panel-body">
                        {{Form::open(['route' => 'admin.media', 'method' => 'get'])}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group col-md-4">
                                    <label for="filter_name">{{__('views.admin.media.index.filter.name')}}</label>
                                    <input class="form-control" type="text" id="filter_name" name="filter_name"
                                           class="form-control"
                                           value="{{$filters['name']}}"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="filter_date">{{__('views.admin.media.index.filter.modified_date')}}</label>
                                    <input class="form-control" type="date" id="filter_date"
                                           name="filter_date"
                                           class="form-control"
                                           value="{{$filters['date']}}"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="filter_type">{{__('views.admin.media.index.filter.type')}}</label>
                                    <select class="form-control" name="filter_type" id="filter_type">
                                        <option
                                                value="{{\App\Models\Media::MEDIA_IMAGE}}"
                                                @if($filters['type'] == \App\Models\Media::MEDIA_IMAGE) selected @endif>
                                            {{__('views.admin.media.index.filter.type.image')}}
                                        </option>
                                        <option
                                                value="{{\App\Models\Media::MEDIA_VIDEO}}"
                                                @if($filters['type'] == \App\Models\Media::MEDIA_VIDEO) selected @endif>
                                            {{__('views.admin.media.index.filter.type.video')}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-1">
                                <input type="submit" class="form-control btn btn-primary"
                                       value="{{__('views.admin.media.index.filter.submit')}}">
                            </div>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($media as $file)
                    <div class="text-center col-xs-3 img-container">
                        <div class="card" style="width: 18rem;">
                            <img class="thumbnail"
                                 src="{{$file->thumbnail_url}}"
                                 data-src="{{$file->url}}"
                                 data-type="{{$file->type}}"
                                 onclick="showImage(this)">
                            <div>
                                <h5 class="media-file-name">
                                    <a href="{{$file->url}}" target="_blank">
                                        @if ($file->type == \App\Models\Media::MEDIA_VIDEO)
                                            <span class="glyphicon glyphicon-play"></span>
                                        @endif
                                        {{ $file->name }}
                                    </a>
                                </h5>
                                <p>{{__('views.admin.media.index.image.filesize')}}
                                    : {{ number_format($file->size / 1000000, 2) }}Mb</p>
                                <p>{{__('views.admin.media.index.image.modified_date')}}: {{$file->c_date}}</p>
                                <a onclick=""
                                   class="btn btn-primary">{{__('views.admin.media.index.image.action.edit')}}</a>
                                <a onclick="deleteMedia('{{$file->name}}')"
                                   class="btn btn-danger">{{__('views.admin.media.index.image.action.delete')}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row pull-right">
                {{$media->links()}}
            </div>
        </div>
    </div>



    <div id="image-modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div id="modal-content" class="modal-body text-center">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        $('#image-modal').on('hidden.bs.modal', function () {
            $('#modal-content').html('');
        });

        var showImage = function (img) {
            var tag = undefined;
            var type = img.getAttribute('data-type');
            var src = img.getAttribute('data-src');
            if (type === '{{ \App\Models\Media::MEDIA_IMAGE }}') {
                tag = $('<img>').addClass('media').attr('src', src);
            } else if (type === '{{ \App\Models\Media::MEDIA_VIDEO }}') {
                tag = $('<video>').addClass('media').prop('controls', true)
                    .append($('<source>').attr('src', src));
            }
            $('#modal-content').append(tag);
            $('#image-modal').modal('show');
        };
        var deleteMedia = function (name) {
            var confirm = window.confirm("{{__('views.admin.media.delete.msg.confirm_delete')}}");
            if (confirm) {
                $.post(
                    '{{route('admin.media.delete')}}',
                    {
                        name: name,
                        _token: '{{csrf_token()}}'
                    },
                    function (e) {
                        window.location.reload();
                    }
                )
            }
        }
    </script>
@endsection