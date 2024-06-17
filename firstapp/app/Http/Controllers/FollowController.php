<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    // función para seguir a un usuario
    public function createfollow(User $user){
        // no puedes seguirte a ti mismo
        if($user->id == auth()->user()->id){
            return back()->with('error', 'No puedes seguirte a ti mismo');
        }

        //no puedes seguir a alguien que ya sigues
        $existCheck = Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $user->id]])->count();
        if($existCheck){
            return back()->with('error', 'Ya sigues a este usuario');
        };

        $newfollow = new Follow;
        $newfollow->user_id = auth()->user()->id;
        $newfollow->followeduser = $user->id;
        $newfollow->save();

        return back()->with('success', 'Sigues a este usuario');
    }

    // función para dejar de seguir a un usuario
    public function deletefollow(User $user){
        Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $user->id]])->delete();
        return back()->with('success', 'Dejaste de seguir a este usuario');
    }
}
