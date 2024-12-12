<?php
namespace Jiny\Modules\Teams\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Projects extends Controller
{
    private $views = [];

    public function __construct()
    {
        $this->views = config('teams.views');
    }

    public function index(Request $req)
    {

        return view($this->views['home']);
    }
}
