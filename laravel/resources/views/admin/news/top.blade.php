@extends('admin.layouts.admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        display: none;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: forestgreen;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px forestgreen;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */

    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    .container-custom {
        margin: auto;
        width: 800px;
        height: auto;
        min-height: 231px;
        position: relative;
    }

    .image_view {
        margin-right: 8.33%;
        width: 200px;
    }

    .image_view {
        width: 250px;
        padding: 8px;
        margin: 8px 0;
    }

    #image_item {
        width: 230px;
        margin: 8px 0;
    }

    .float_left {
        float: left;
    }

    .float_right {
        float: right;
    }
</style>
<script>
    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
    }

    function removeNode(node) {
        node.parentNode.removeChild(node);
    }

    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        var nodeCopy = document.getElementById(data).cloneNode(true);
        if (data) {
            if (ev.target.nodeName == 'TD') {
                ev.target.parentNode.appendChild(nodeCopy);
                removeNode(ev.target);
            } else
                ev.target.appendChild(nodeCopy);
        }
        ev.stopPropagation();

        return false;
    }

    var newTopSetting = function () {
        if (($('#new-post-1 td').attr('id')) == null ||  ($('#new-post-2 td').attr('id')) == null ||
            ($('#community-post-1 td').attr('id')) == null || ($('#community-post-2 td').attr('id')) == null ||
            ($('#product-post-1 td').attr('id')) == null || ($('#product-post-2 td').attr('id')) == null ||
            ($('#recuirment-post-1 td').attr('id')) == null || ($('#recuirment-post-2 td').attr('id')) == null ||
            ($('#video-post-1 td').attr('id')) == null || ($('#video-post-2 td').attr('id')) == null) {
                alert('Vui lòng setting đầy đủ các mục !');
                return true;
        } else {
            var newLists = {
                new_post_1: $('#new-post-1 td').attr('id'),
                new_post_2: $('#new-post-2 td').attr('id'),
                community_post_1: $('#community-post-1 td').attr('id'),
                community_post_2: $('#community-post-2 td').attr('id'),
                product_post_1: $('#product-post-1 td').attr('id'),
                product_post_2: $('#product-post-2 td').attr('id'),
                recuirment_post_1: $('#recuirment-post-1 td').attr('id'),
                recuirment_post_2: $('#recuirment-post-2 td').attr('id'),
                video_post_1: $('#video-post-1 td').attr('id'),
                video_post_2: $('#video-post-2 td').attr('id')
            }
        }
        $.post(
            '{{ route('admin.new.setting_top') }}',
            {
                jsonSetting: JSON.stringify(newLists),
                _token: '{{csrf_token()}}'
            },
            function (e) {
                location.href = "{{ route('admin.news.top') }}"
            }
        )
    }
</script>

@section('content')
    <div class="row">
        @if(\Illuminate\Support\Facades\Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
            @endif
        <div class="filter1 col-md-6">
        </div>
        <div class="col-md-12">
            <div class="col-md-5">
                <div class="panel panel-primary">
                    <div class="panel-heading"><b>Tin tức</b></div>
                    <div>
                        <div class="panel-body form-horizontal">
                            <div>
                                <label>Bài 1</label>
                                <div id="new-post-1" ondrop="drop(event)" ondragover="allowDrop
                                (event)"
                                     style="height: 20px; color: darkgreen">
                                </div>
                            </div>
                            <br/>
                            <div>
                                <label>Bài 2</label>
                                <div id="new-post-2" ondrop="drop(event)" ondragover="allowDrop(event)"
                                     style="height: 20px; color: darkgreen">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading"><b>Trách nhiệm xã hội</b></div>
                    <div>
                        <div class="panel-body form-horizontal">
                            <div>
                                <label>Bài 1</label>
                                <div id="community-post-1" ondrop="drop(event)" ondragover="allowDrop(event)"
                                     style="height: 20px; color: darkgreen">
                                </div>
                            </div>
                            <br/>
                            <div>
                                <label>Bài 2</label>
                                <div id="community-post-2" ondrop="drop(event)" ondragover="allowDrop(event)"
                                     style="height: 20px;  color: darkgreen">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading"><b>Sản phẩm</b></div>
                    <div>
                        <div class="panel-body form-horizontal">
                            <div>
                                <label>Bài 1</label>
                                <div id="product-post-1" ondrop="drop(event)" ondragover="allowDrop(event)"
                                     style="height: 20px; color: darkgreen">
                                </div>
                            </div>
                            <br/>
                            <div>
                                <label>Bài 2</label>
                                <div id="product-post-2" ondrop="drop(event)" ondragover="allowDrop(event)"
                                     style="height: 20px;  color: darkgreen">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading"><b>Tuyển dụng</b></div>
                    <div>
                        <div class="panel-body form-horizontal">
                            <div>
                                <label>Bài 1</label>
                                <div id="recuirment-post-1" ondrop="drop(event)" ondragover="allowDrop(event)"
                                     style="height: 20px; color: darkgreen">
                                </div>
                            </div>
                            <br/>
                            <div>
                                <label>Bài 2</label>
                                <div id="recuirment-post-2" ondrop="drop(event)" ondragover="allowDrop(event)"
                                     style="height: 20px;  color: darkgreen">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading"><b>Videos</b></div>
                    <div>
                        <div class="panel-body form-horizontal">
                            <div>
                                <label>Bài 1</label>
                                <div id="video-post-1" ondrop="drop(event)" ondragover="allowDrop(event)"
                                     style="height: 20px; color: darkgreen">
                                </div>
                            </div>
                            <br/>
                            <div>
                                <label>Bài 2</label>
                                <div id="video-post-2" ondrop="drop(event)" ondragover="allowDrop(event)"
                                     style="height: 20px;  color: darkgreen">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button style="margin-bottom: 20px; float: right" onclick="newTopSetting()" class="btn btn-xl btn-success">
                    Hoàn thành
                </button>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary" style="margin-left: 50px; width: 40%; position: fixed">
                    <div class="panel-heading"><b>Danh sách bài đăng</b></div>
                    <div class="panel-body form-horizontal" style="max-height: 450px; overflow-y: scroll;">
                        {{--<form method="get" action="{{ route('admin.news.top') }}">--}}
                        <div class="filter1 col-md-8">
                            <label>Tìm kiếm</label>
                            <input type="text" name="title" class="form-control" id="search" name="search"
                                   placeholder="Nhập tiêu đề tin tức..." style="margin-bottom: 10px;"/>
                        </div>
                        <table width="100%" class="table table-striped table-bordered table-hover table-sm"
                               id="dataTables-example"
                               style="color: black;">
                            <tbody>
                            @foreach($news as $new)
                                @if(empty($output))
                                    <tr>
                                        <td draggable="true" ondragstart="drag(event)" style="margin: 0;"
                                            id="{{$new->id}}">
                                            {{$new->title}} </td>
                                    </tr>
                                @endif
                            @endforeach
                            {{--{{ $news->links() }}--}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> {{--All--}}

    <script type="text/javascript">
        $('#search').on('keyup', function () {
            $value = $(this).val();
            $.ajax({
                type: 'GET',
                url: '{{URL::to('admin/news-top/search')}}',
                data: {'search': $value},
                success: function (data) {
                    $('tbody').html(data);
                }
            });
        })
    </script>

@endsection @section('scripts') @parent {{ Html::script(mix('assets/admin/js/dashboard.js')) }} {{ Html::script
('js/slider.js')}}
@endsection @section('styles') @parent {{ Html::style(mix('assets/admin/css/dashboard.css')) }} @endsection