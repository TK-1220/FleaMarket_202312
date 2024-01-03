<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ListDisplays;
use PhpParser\Builder\Use_;

class MyToolController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(int $user_id)
    {
        $displays = ListDisplays::where('user_id', $user_id)->get();

        // $historys = ListDisplays

        return view('mypage', [
            'displays' => $displays,
        ]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function store(Request $request)
    {
        //
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
        return view('follow');
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit(int $user_id)
    {
        return view('mypage_edit');
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $user_id)
    {
        $dir = 'img_icon/';
        if (isset($request->image)){
            $filename = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dir, $filename);
            $filepath =  'storage/' . $dir . $filename;
        }

        $model = new User;
        $model = $model->find($user_id);
        $columns = ['name', 'email', 'profile', 'image'];
        foreach ($columns as $column) {
            if (!isset($request->$column)) { continue; }

            if ($column == 'image') {
                $model->$column = $filepath;
            } else {
                $model->$column = $request->$column;
            }
        }
        $model->save();
        return redirect('mypage/' . $user_id . '/home');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(Request $request, $user_id)
    {
        $accounts = User::find($user_id);
        if ($request->flag == 1) {
            $accounts->del_flg = 1;
            $accounts->save();
        } else {
            $accounts->delete;
        }
        return redirect('/');
    }
}
