<div class="fnc_ux"></div>
<header class="add_gnb">
    <div class="wrapped">
        <h1>
            <a href="{{route('board.index')}}">blind</a>
            <em class="topic">Topic</em>
        </h1>

         {{-- 로그인 상태 --}}
         @auth
         <div class="actions">
            <a href="{{route('friend.show')}}">친구추가</a>
            <a class="btn_write" href="{{route('board.create')}}">글쓰기</a>
            <a class="btn_signin" href="{{route('user.logout.get')}}">로그아웃</a>
        </div>
         @endauth
        {{-- 비로그인 상태 --}}
        @guest
        <div class="actions">
            <a class="btn_signin" href="{{route('user.login.get')}}">로그인</a>
        </div>
        @endguest
    </div>
</header>