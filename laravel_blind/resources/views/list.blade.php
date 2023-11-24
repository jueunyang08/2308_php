@extends('layout.layout')

@section('title', 'List')

@section('main')
<section class="container">
    <div class="wrapped">
        <main class="flex-container">
            <div class="content">
                <div class="list">
                    @forelse($c_data as $item1)
                        <div class="categorydiv">
                            <div>{{ $item1->name }} <a href="" class="more_btn">더보기></a></div>
                            <hr>
                            @forelse ($b_data as $item2)
                                <div>
                                    <p>{{ $item2->title }}</p>
                                    <div>{{ $item2->hits }}</div>
                                </div>
                            @empty
                                <!-- b_data가 비어있을때 처리 -->
                                <div>게시글 없음</div>
                            @endforelse
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