@extends('layout.layout')

@section('title', 'List')

@section('main')
{{-- 전체 영역 --}}
<section class="container">
    <div class="wrapped">

        {{-- 왼쪽영역 --}}
        <main role="main" class="content">
            <div class="home-list">
            {{-- 검색영역 --}}
            <div class="search-div"> <div class="section-btn-srch"><button class="btn-srch"></button></div>
            <input type="search" class="serach-bar" placeholder="관심있는 내용을 검색해보세요!">
            </div>
                <div class="topic-list best">
                </div>

                {{-- 카테고리 게시글 영역 start --}}
                <div class="topic-list">
                    @forelse($data as $key => $item)
                    {{---------------------------------- 박스 --}}
                    <div class="box">
                    {{-- 카테고리명 --}}
                        <div class="category-name-div"><img id="category{{$item[0][0]->id}}" width="32" height="32"><span class="category-name">{{ $item[0][0]->name }}</span><a href="{{route('board.showTopic', ['id' => $item[0][0]->id])}}" class="more-btn"> 더보기></a></div>
                            @forelse ($item[1] as $val) 
                                <div class="article">
                                    {{-- 글제목 --}}
                                    <div class="article-title">{{ $val->title }}</div>
                                    {{-- 조회수 --}}
                                    <div class="article-view"><div class="wrap-info"></div><a href="" class="pv">{{ $val->hits }}</a></div>
                                </div>
                            @empty
                                <div class="article-empty"><p>게시글없음</p></div>
                            @endforelse
                    </div>
                    {{---------------------------------- 박스 --}}
                    @empty
                    @endforelse
                </div>
                {{-- 카테고리 게시글 영역 end --}}

            </div>
        </main>

        {{-- 오른쪽 영역 --}}
        <aside class="aside">
            <div class="lst-ranking">
                <h1>실시간 인기 회사</h1>
                <div class="inner">
                    <p class="rank"><em>1</em>한국전력공사</p>
                    <p class="rank"><em>2</em>한국전력공사</p>
                    <p class="rank"><em>3</em>한국전력공사</p>
                    <p class="rank"><em>4</em>한국전력공사</p>
                    <p class="rank"><em>5</em>한국전력공사</p>
                    <p class="rank"><em>6</em>한국전력공사</p>
                    <p class="rank"><em>7</em>한국전력공사</p>
                    <p class="rank"><em>8</em>한국전력공사</p>
                    <p class="rank"><em>9</em>한국전력공사</p>
                    <p class="rank"><em>10</em>한국전력공사</p>
                </div>
            </div>
        </aside>
    </div>
</section>
@endsection