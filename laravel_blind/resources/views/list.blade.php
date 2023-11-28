@extends('layout.layout')

@section('title', 'List')

@section('main')
<section class="container">
    <div class="wrapped">
        <main class="flex-container">
            <div class="content">
                <div class="list">
                    @forelse($data as $key => $item)
        
                    <div><img id="category{{$item[0][0]->id}}" width="32" height="32"><span class="category-name">{{ $item[0][0]->name }}</span><a href="" class="more_btn"> 더보기></a></div>
                        <div class="categorydiv">
                                <div>
                                    @forelse ($item[1] as $val) 
                                    <div>
                                        {{-- 글제목 --}}
                                        <span>{{ $val->title }}</span>
                                        {{-- 조회수 --}}
                                        <div class="wrap-info"></div><a href="" class="pv">{{ $val->hits }}</a>
                                    </div>
                                    @empty
                                        <p>비어있음</p>
                                    @endforelse
                                </div>
                            <hr>
                        </div>
                    @empty
                        <!-- c_data가 비어있을때 처리 -->
                        <div>게시글 없음</div>
                    @endforelse

                    
                </div>
            </div>
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
        </main>
    </div>
</section>
@endsection