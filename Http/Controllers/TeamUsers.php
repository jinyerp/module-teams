<?php
namespace Jiny\Modules\Teams\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TeamUsers extends Controller
{
    private $tablename = "module_teams";
    private $views = [];

    public function __construct()
    {
        $this->views = config('teams.views');
    }

    public function index(Request $req)
    {
        $id = Auth::user()->id;
        $project = DB::table($this->tablename)->find($req->id);
        return view($this->views['users'],['project'=>$project]);
    }
}
