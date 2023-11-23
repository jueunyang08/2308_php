@extends('layout.layout')

@section('title', 'Blind')

@section('main')
<main>
    @forelse($data as $item)
    <div>
        <p>{{$item->title}}</p>
    </div>
    @empty
    <div>게시글 없음</div>
    @endforelse
</main>
@endsection