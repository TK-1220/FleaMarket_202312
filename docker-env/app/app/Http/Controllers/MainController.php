<?php
namespace App\Http\Controllers;
use App\ListBuys;
use App\ListDisplays;
use App\Follows;
use App\User;
use App\Like;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use ListDisplaysTableSeeder;

class MainController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $datalist = ListDisplays::withCount('likes')->paginate(10);
        $like_model = new Like;
        return view('main', [
            'datalist' => $datalist,
            'keyword' => $keyword,
            'like_model' => $like_model,
        ]);
    }

    public function ajaxlike(Request $request)
    {
        $id = Auth::user()->id;
        $display_id = $request->display_id;

        $like = new Like;
        $display = ListDisplays::findOrFail($display_id);

        if ($like->like_exist($id, $display_id)) {
            $like = Like::where('display_id', $display_id)->where('user_id', $id)->delete();
        } else {
            $like = new Like;
            $like->display_id = $display_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }
        // $exist = $like->like_exist($id, $display_id);
        $exist = Like::where('user_id', $id)->where('display_id', $display_id)->exists();
        // dd($exist);
        $displayLikesCount = $display->loadCount('likes')->likes_count;
        $json = [
            'displayLikesCount' => $displayLikesCount,
            'exist' => $exist,
        ];
        return response()->json($json);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function search(Request $request)
    {

        $query = ListDisplays::withCount('likes');

        $price_0 = $request->price;
        $price_1 = $price_0 + 5000;

        $keyword = $request->input('keyword');
        if (!empty($keyword)) {
            $query->where('profile', 'like', "%{$keyword}%");
            $query->orWhere('name', 'like', "%{$keyword}%");
        }
        $datalist = $query->paginate(10);

        if (!empty($price_0)) {
            $datalist = $datalist->whereBetween("price", [$price_0, $price_1]);
        }
        $like_model = new Like;
        return view('main', [
            'datalist' => $datalist,
            'keyword' => $keyword,
            'like_model' => $like_model,
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
    public function handler(int $displayId)
    {
        return view('buy_handler', [
            'displayId' => $displayId,
        ]);
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
    public function procedure(Request $request, $displayId)
    {
        $user_id = $request->user_id;
        $now_date = Carbon::now()->format('Y/m/d');

        // User infomation
        $user = User::find($user_id);
        // $columns = ['realname', 'code', 'address', 'tel_number'];
        $columns = ['code', 'address', 'tel'];
        foreach ($columns as $column) {
            $user->$column = $request->$column;
        }
        $user->save();

        // Display
        $display = ListDisplays::find($displayId);
        $display->del_flg = 1;
        $display->save();

        // Buy List
        $buy = new ListBuys;
        $buy->user_id = $user_id;
        $buy->list_id = $displayId;
        $buy->date = $now_date;
        $buy->save();

        return redirect('/');
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
