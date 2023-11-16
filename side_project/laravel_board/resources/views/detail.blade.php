@extends('layout.layout')

@section('title', 'Detail')

@section('main')
<form method="POST" action="{{route('board.destroy', ['board' => $data->b_id])}}">
    @csrf
    @method('DELETE')
<main>
    <div class="mb-3">
        <p>글번호</p>
        <p class="card-text">{{$data->b_id}}</p>
    </div>
    <div class="mb-3">
        <p>제목</p>
        <p class="card-text">{{$data->b_title}}</p>
    </div>
    <div class="mb-3">
        <p>내용</p>
        <p class="card-text">{{$data->b_content}}</p>
    </div>
    <div class="mb-3">
        <p>조회수</p>
        <p class="card-text">{{$data->b_hits}}</p>
    </div>
    <div class="mb-3">
        <p>작성일</p>
        <p class="card-text">{{$data->created_at}}</p>
    </div>
    <div class="mb-3">
        <p>수정일</p>
        <p class="card-text">{{$data->updated_at}}</p>
    </div>
</main>
<button onclick="return deLete()" type="submit">삭제</button>
</form>
@endsection

{{-- @section('main')
<main class="d-flex justify-content-center align-items-center h-75">
    
        @forelse($data as $item)
        <h5 class="card-title">{{$item->b_title}}</h5>
        <p class="card-text">{{$item->b_content}}</p>
        @empty
        @endforelse
    </main>
@endsection --}}
