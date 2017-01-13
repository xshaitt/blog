@extends('layouts.profile_master')
@section('title',$user['name'].'----个人中心')
@section('profile_pic')
    <img alt="" src="{{asset($userInfo['profile_photo'])}}">
    <form method="post">
        <input type="hidden" value="xxxx" name="_token">
        <input type="file" name="profilePhoto" class="layui-upload-file"
               xsh-csrf="{{csrf_token()}}">
    </form>
@stop
@section('user_info')
    <form method="post">
        {{csrf_field()}}
        <ul class="p-info">
            @if(!empty(session('updateProfile')))
                <div class="alert-danger alert">
                    {{session('updateProfile')}}
                </div>
            @endif
            <li>
                <div class="title">用户名</div>
                <label>{{$user['name']}}</label>
            </li>
            <li>
                <div class="title">昵称</div>
                <input name="nickname" class="form-control"
                       value="{{$userInfo['nickname']}}">
            </li>
            <li>
                <div class="title" style="height: 38px;line-height: 38px;">生日</div>
                <div class="layui-inline">
                    <input value="{{date('Y-m-d',$userInfo['birthday'])}}"
                           name="birthday" class="layui-input" placeholder="生日"
                           onclick="layui.laydate({elem: this, istime: true, format: 'YYYY-MM-DD'})">
                </div>
            </li>
            <li>
                <div class="title">标签</div>
                <input name="tag" class="form-control" value="{{$userInfo['tag']}}">
            </li>
            <li>
                <div class="title">爱好</div>
                <input name="hobby" class="form-control" value="{{$userInfo['hobby']}}">
            </li>
            <li style="text-align: center;">
                <button class="btn btn-success">保存</button>
            </li>
        </ul>
    </form>
@stop
@section('script')
    <script>
        var profilePhotoUrl = '{{url("upprofilephoto/{$user['id']}")}}';
        layui.use('laydate', function () {
            var laydate = layui.laydate;
        });
        layui.use('upload', function () {
            layui.upload({
                url: profilePhotoUrl
                , success: function (res, input) {
                    $('.profile-pic img').attr('src', res.data.src);
                }
            });
        });
    </script>
@stop