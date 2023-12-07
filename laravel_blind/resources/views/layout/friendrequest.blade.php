<div>
    <p> 친구 ID로 추가 </p>
    <form action="{{route('friend.sendFriendRequest')}}" method="POST">
    <input type="text" name="friend_id_input"><button class="friend-add-btn" type="submit">+</button>
    </form>
</div>