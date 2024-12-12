<?php
namespace Jiny\Erp\Teams\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MyProjects extends Controller
{

    public function __construct()
    {

    }

    public function index(Request $req)
    {
        return view("jiny-erp-teams::projects.myprojects");
    }
}
