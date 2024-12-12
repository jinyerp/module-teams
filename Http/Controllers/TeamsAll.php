<?php
namespace Jiny\Modules\Teams\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TeamsAll extends Controller
{
    private $views = [];

    public function __construct()
    {
        $this->views = config('teams.views');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view($this->views['all']);
    }

}
