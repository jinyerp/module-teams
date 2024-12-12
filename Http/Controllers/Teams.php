<?php
namespace Jiny\Modules\Teams\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Jiny\Site\Http\Controllers\SiteController;
class Teams extends SiteController
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        $this->actions['view']['layout']
            = inSlotView("home.teams",
                "module-teams::home.teams.layout");
    }

    public function index(Request $request)
    {
        return parent::index($request);
    }

}
