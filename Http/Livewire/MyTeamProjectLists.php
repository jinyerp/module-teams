<?php
namespace Modules\Teams\Http\Livewire;

use Illuminate\Contracts\Container\Container;
use Illuminate\Routing\Route;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

// 테이블 필드를 리스트 목록으로 출력합니다.
class MyTeamProjectLists extends Component
{
    private $tablename = "teams";
    public $forms=[];
    public $inlineAdd = false;

    public function render()
    {
        $id = Auth::user()->id;

        $rows = DB::table($this->tablename)->where('user_id', $id)->get();

        return view("teams::myproject.lists",[
            'rows' => $rows
        ]);
    }

    public function create()
    {
        $this->inlineAdd = true;
        //dd("create");
    }

    public function store()
    {
        $id = Auth::user()->id;

        // 2. 시간정보 생성
        $this->forms['created_at'] = date("Y-m-d H:i:s");
        $this->forms['updated_at'] = date("Y-m-d H:i:s");

        if($this->forms['title']) {
            // 임시로 코드 생성
            $this->forms['code'] = $this->forms['title'];
            $this->forms['user_id'] = $id;
            $id = DB::table($this->tablename)
                ->insertGetId($this->forms);
        }

        $this->inlineAdd = false;
    }
}
