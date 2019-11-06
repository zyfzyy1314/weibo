{{-- 
当 @section 传递了第二个参数时，便不需要再通过 @stop 标识来告诉 Laravel 填充区块会在具体哪个位置结束。    
--}}

@extends('layouts.default')
@section('title','主页')

@section('content')

    <div class="jumbotron">
        <h1>Hello Laravel</h1>
        <p class="lead">
          你现在所看到的是 <a href="https://learnku.com/courses/laravel-essential-training">Laravel 入门教程</a> 的示例项目主页。
        </p>
        <p>
          一切，将从这里开始。
        </p>
        <p>
          <a class="btn btn-lg btn-success" href="#" role="button">现在注册</a>
        </p>
    </div>

@endsection
