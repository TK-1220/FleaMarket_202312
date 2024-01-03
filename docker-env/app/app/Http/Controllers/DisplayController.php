<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\ListDisplays;
use App\Follows;
use App\User;

class DisplayController extends Controller
{
    public function detail(int $displayId)
    // public function detail(ListDisplays, $listDisplays)
    {
        // URL
        $prevurl = url()->previous();
        // Load Display Infomation.
        $data = new ListDisplays;
        $data = $data->find($displayId);
        $display_imagefile = $data['image'];

        // Load User Infomation.
        $user = new User;
        $user = $user->find($data['user_id']);
        $icon_imagefile =  $user['image'];
        return view('detail', [
            'data' => $data,
            'dis_img' => $display_imagefile,
            'user' => $user,
            'icon_img' => $icon_imagefile,
            'prevurl' => $prevurl,
        ]);
    }

    public function profile($user_id)
    {
        $my_id = Auth::user()->id;
        $prevurl = url()->previous();
        $follows = Follows::where('user_id', $my_id)->get();
        $user = User::find($user_id);
        $displays = ListDisplays::where('user_id', $user_id)->get();

        return view('profile', [
            'user_info' => $user,
            'displays' => $displays,
            'prevurl' => $prevurl,
            'follows' => $follows,
        ]);
    }

    public function follow(Request $request, $user_id)
    {
        $my_id = Auth::user()->id;
        $prevurl = url()->previous();
        $follow = new Follows;
        $follow->follow_id = $user_id;
        $follow->user_id = $my_id;
        $follow->save();

        $user = User::find($user_id);
        $follows = Follows::where('user_id', $my_id)->get();
        $displays = ListDisplays::where('user_id', $user_id)->get();

        return view('profile', [
            'user_info' => $user,
            'displays' => $displays,
            'prevurl' => $prevurl,
            'follows' => $follows,
        ]);
    }
}
