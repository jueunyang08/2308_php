@extends('layout.layout')

@section('title', 'Updaste')

@section('main')

<main class="d-flex justify-content-center align-items-center h-75">
    <form action="{{route('board.update', ['board' => $data->b_id])}}" method="POST" style="width: 600px;">
        @csrf
        @method('PUT')
        @include('layout.errorlayout')
        <br>
        
        <label for="b_title">제목</label>
        <input value="{{$data->b_title}}" class="form-control" type="text" id="b_title" name="b_title" autocomplete="off"><br>

        <label for="title">내용</label>
        <textarea style="height: 300px;" class="form-control" type="text" id="b_content" name="b_content" autocomplete="off" style="resize: none">{{$data->b_content}}</textarea>
        <br>

        <a href="{{route('board.show', ['board' => $data->b_id])}}"><button class="btn btn-dark" type="button">취소</button></a>
        <button class="btn btn-primary float-end" type="submit">수정</button>
    </form>
</main>
@endsection