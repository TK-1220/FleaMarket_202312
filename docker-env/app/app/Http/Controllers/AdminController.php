<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ListDisplays;
use App\Follows;
use App\ListBuys;
use ListDisplaysTableSeeder;
use PhpParser\Builder\Use_;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->root) {
            return redirect('login');
        } else {
            return view('admin/admin_login');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function displays()
    {
        $displays = ListDisplays::all();

        return view('admin/admin_displays', [
            'displays' => $displays,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteDisplay(Request $request)
    {
        $id = $request->id;
        $display = ListDisplays::find($id);
        if ($display->del_flg == 0) {
            $display->del_flg = 1;
        } else {
            $display->del_flg = 0;
        }
        $display->save();
        $displays = ListDisplays::all();
        return view('admin/admin_displays', [
            'displays' => $displays,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        $users = User::all();
        return view('admin/admin_users', [
            'users' => $users,
        ]);
    }

    public function deleteUsers(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        if ($user->del_flg == 0) {
            $user->del_flg = 1;
        } else {
            $user->del_flg = 0;
        }
        $user->save();
        $users = User::all();
        return view('admin/admin_users', [
            'users' => $users,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
