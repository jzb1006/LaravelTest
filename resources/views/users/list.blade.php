@extends('layouts.default')
@section('title', '用户列表')
@section('content')
    @foreach($all as $user)
    <div class="list-group-item">
        <img class="mr-3" src="{{ $user->gravatar() }}" alt="{{ $user->name }}" width=32>
        <a href="{{ route('users.show', $user) }}">
            {{ $user->name }}
        </a>
        {{--@can('destroy', $user)--}}
            {{--<form action="{{ route('users.destroy', $user->id) }}" method="post" class="float--}}
{{--{{ csrf_field() }}--}}
            {{--{{ method_field('DELETE') }}--}}
                    {{--<button type="submit" class="btn btn-sm btn-danger delete-btn">删除</button>--}}
            {{--</form>--}}
        {{--@endcan--}}
    </div>
    @endforeach
    <nav aria-label="...">
        <ul class="pagination">
            <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
            <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
            ...
        </ul>
    </nav>
@stop