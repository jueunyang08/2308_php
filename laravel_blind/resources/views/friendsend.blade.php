<div>
    <p> 친구 Email로 추가 </p>
    <form action="{{ route('friend.sendFriendRequest') }}" method="POST">
    @csrf
    <input type="email" name="receiver_email" placeholder="이메일 입력" autocomplete="off"><button class="friend-add-btn" type="submit">+</button>
    </form>
    @error('receiver_email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
</div>