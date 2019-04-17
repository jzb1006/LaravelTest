@extends('layouts.default')

@section('title','登陆')
@section('content')

    <div class="offset-md-2 col-md-8">
        <div class="card ">
            <div class="card-header">
                <h5>登录</h5>
            </div>
            <div class="card-body">
            @include('shared._error')
            <form method="post" action="{{route('login')}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label for="email">
                        <input type="text" name="email" class="form-control" value="{{old('email')}}">
                    </label>
                </div>

                <div class="form-group">
                    <label for="password">
                        <a href="{{route('password.request')}}">忘记密码</a>
                        <input type="text" name="password" class="form-control" value="{{old('password')}}">
                    </label>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox">请记住我

                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">登陆</button>

            </form>
            <hr>
            <p>还没账号？<a href="{{route('signup')}}">注册</a></p>
        </div>
        </div>
    </div>

    @stop
