@extends('layouts.profile_master')
@section('title',$user['name'].'----个人中心')
@section('profile_pic')
    <img alt="" src="{{asset($userInfo['profile_photo'])}}">
@stop
@section('user_info')
    <ul class="p-info">
        <li>
            <div class="title">用户名</div>
            <div class="desk">{{$user['name']}}</div>
        </li>
        <li>
            <div class="title">昵称</div>
            <div class="desk">{{$userInfo['nickname'] or '没有设置昵称'}}</div>
        </li>
        <li>
            <div class="title">生日</div>
            <div class="desk">{{$userInfo['birthday']==null?'没有设置生日':date('Y-m-d',$userInfo['birthday'])}}</div>
        </li>
        <li>
            <div class="title">标签</div>
            <div class="desk">{{$userInfo['tag'] or '没有设置标签'}}</div>
        </li>
        <li>
            <div class="title">爱好</div>
            <div class="desk">{{$userInfo['hobby'] or '没有设置爱好'}}</div>
        </li>
    </ul>
@stop