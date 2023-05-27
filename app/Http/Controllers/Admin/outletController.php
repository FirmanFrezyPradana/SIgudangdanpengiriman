<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tb_outlet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class outletController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    public function index()
    {
        $data_outlet = DB::table('users')
            ->join('tb_outlets', 'users.id', '=', 'tb_outlets.id_user')
            ->get();
        return view('admin.outlet.index', ['data_outlet' => $data_outlet]);
    }
    public function destroy($id)
    {
        tb_outlet::find($id)->delete();
        return redirect()->route('outlet')->with('message', 'Berhasil Dihapus');
    }
}
