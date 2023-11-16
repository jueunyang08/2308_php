@extends('layout.layout')

@section('title', 'Insert')

@section('main')

<main class="d-flex justify-content-center align-items-center h-75">
    <form action="{{route('board.store')}}" method="POST" style="width: 600px;">
        @include('layout.errorlayout')
        <br>
        @csrf
        <label for="b_title">제목</label>
        <input class="form-control" type="text" id="b_title" name="b_title" autocomplete="off"><br>

        <label for="title">내용</label>
        <textarea style="height: 300px;" class="form-control" type="text" id="b_content" name="b_content" autocomplete="off" style="resize: none"></textarea>
        <br>

        <a href="{{route('user.login.get')}}"><button class="btn btn-dark" type="button">뒤로가기</button></a>
        <button class="btn btn-primary float-end" type="submit">작성</button>
    </form>
</main>
@endsection