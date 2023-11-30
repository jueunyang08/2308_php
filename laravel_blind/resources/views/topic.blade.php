@extends('layout.layout')

@section('title', '블라블라')

@section('main')


    <div class="adwrap">
        <img id="adimg" src="/img/web_banner_01.png">
    </div>

<div class="topic-div">
<div class="article-list">
@forelse($data as $item)

<div class="article-list-pre">
    
    <div class="tit">
    {{-- 제목 --}}<h2 class="topic-list-title">{{$item->title}}</h2>
    {{-- 내용 --}}<p class="topic-list-content">{{$item->content}}</p>
    </div>
    
    <div class="sub">
    {{-- 조회수 --}}<div class="wrap-info"></div><a href="" class="pv">{{ $item->hits }}</a>
    </div>

</div>

@empty
@endforelse
</div>
</div>
@endsection