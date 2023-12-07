<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Friendship;

class FriendRequestController extends Controller
{
    // 친구요청 보내기 로직
    public function sendFriendRequest(Request $request)
    {
        $inputValue = $request->input('friend_id_input');

        // 입력값으로 유저 찾기
        $friend = User::where('username', $inputValue)->first();

        if (!$friend) {
            return response()->json(['message' => '해당 유저를 찾을 수 없습니다.'], 404);
        }

        // 이미 친구 관계인지 확인 (옵션)
        $existingFriendship = Friendship::where([
            'user_id' => auth()->user()->id,
            'friend_id' => $friend->id,
        ])->first();

        if ($existingFriendship) {
            return response()->json(['message' => '이미 친구 관계입니다.'], 400);
        }

        // 친구 요청 보내기
        $friendship = new Friendship();
        $friendship->user_id = auth()->user()->id;
        $friendship->friend_id = $friend->id;
        $friendship->status = 'pending';
        $friendship->save();

        return response()->json(['message' => '친구 요청을 보냈습니다.']);
    }

    public function acceptFriendRequest($friendId)
    {
        // 친구 요청 수락 로직
    }

    public function rejectFriendRequest($friendId)
    {
        // 친구 요청 거절 로직
    }

}
