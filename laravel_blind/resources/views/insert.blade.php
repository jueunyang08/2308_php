@extends('layout.layout')

@section('title', 'Insert')

@section('main')

<main class="d-flex justify-content-center align-items-center h-75">
    <form action="{{route('board.store')}}" method="POST" style="width: 600px;">
        @csrf
        @include('layout.errorlayout')
        <br>
        {{--카테고리선택 --}}
        <div class="dropdown">
            <select name="categories_no" class="btn btn-dark dropdown-toggle w100 h50">
                @forelse ($CateGoryName as $item)
                <option value="{{$item->no}}">{{$item->name}}</option>
                @empty
                @endforelse
            </select>
        </div>


        <label for="title"></label>
        <input class="form-control" type="text" id="title" name="title" autocomplete="off"><br>

        <label for="content"></label>
        <textarea style="height: 300px;" class="form-control" type="text" id="content" name="content" autocomplete="off" style="resize: none"></textarea>
        <br>

        <a href="{{route('board.index')}}"><button class="btn btn-dark" type="button">뒤로가기</button></a>
        <button class="btn btn-primary float-end" type="submit">작성</button>
    </form>
</main>
@endsection