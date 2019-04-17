@extends('layouts.default')
@section('title','主页')

@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())
        <div class="row">
            <div class="col-md-8">
                <section class="status_form">
                    @include('shared._status_form')
                </section>
            </div>
            <aside class="col-md-4">
                <section class="user_info">
                    @include('shared._user_info',['user'=>\Illuminate\Support\Facades\Auth::user()]);
                </section>
            </aside>
        </div>
    @else
        <div class="jumbotron">
            <h1>Hello Laravel</h1>
            <p class="lead">
                你现在所看到的是 <a href="https://laravel-china.org/courses/laravel-essential-tra"></a>
            </p>
            <p>
                一切，将从这里开始。
            </p>
            <p>
                <a class="btn btn-lg btn-success" href="{{route('signup')}}" role="button">现在注册</a>
            </p>
        </div>
    @endif
@stop
