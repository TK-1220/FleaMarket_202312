<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListBuys;
use App\ListDisplays;
use App\Follows;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $models = new ListDisplays;
        $all = $models->all()->toArray();

        return view('register_display', [
            'list_displays' => $all,
        ]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $dir = 'img_display/';
        $filename = $request->file('image')->getClientOriginalName();
        $filepath =  'storage/' . $dir . $filename;

        $model = new ListDisplays;
        $columns = ['name', 'image', 'price', 'profile', 'user_id'];
        foreach ($columns as $column) {
            if ($column == 'image') {
                $model->$column = $filepath;
                $request->file('image')->storeAs('public/' . $dir, $filename);
            } else {
                $model->$column = $request->$column;
            }
        }
        $model->save();
        return redirect('/register_complete');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show()
    {

    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit(int $displayId)
    {
        $prevurl = url()->previous();
        $display = new ListDisplays;
        $display = $display->find($displayId)->toArray();

        return view('register_edit', [
            'displayId' => $displayId,
            'display' => $display,
            'prevurl' => $prevurl,
        ]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $displayId)
    {
        $model = new ListDisplays;
        $model = $model->find($displayId);
        $columns = ['name', 'price', 'profile'];
        foreach ($columns as $column) {
            if (!isset($request->$column)) {
                continue;
            } else {
                $model->$column = $request->$column;
            }
        }
        $model -> save();
        $url = $request['prevurl'];
        return redirect($url);
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
