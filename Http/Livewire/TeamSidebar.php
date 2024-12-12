<?php
namespace Jiny\Modules\Teams\Http\Livewire;

use Illuminate\Contracts\Container\Container;
use Illuminate\Routing\Route;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

// 테이블 필드를 리스트 목록으로 출력합니다.
class TeamSidebar extends Component
{
    private $tablename = "module_teams";
    public $forms=[];
    public $inlineAdd = false;

    public function render()
    {
        $id = Auth::user()->id;

        $rows = DB::table($this->tablename)->where('user_id', $id)->get();

        return view("jiny-module-teams::livewire.sidebar",[
            'rows' => $rows
        ]);
    }

    protected $listeners = [
        'refeshTable'
    ];

    public function refeshTable()
    {

    }

    public function create()
    {
        $this->inlineAdd = true;
        //dd("create");
    }

    public function store()
    {
        $user_id = Auth::user()->id;

        // 프로젝트 삽입
        $todayTime = date("Y-m-d H:i:s");
        $this->forms['created_at'] = date("Y-m-d H:i:s");
        $this->forms['updated_at'] = date("Y-m-d H:i:s");

        if($this->forms['title']) {
            // 임시로 코드 생성
            $this->forms['code'] = $this->forms['title'];
            $this->forms['user_id'] = $user_id;
            $project_id = DB::table($this->tablename)
                ->insertGetId($this->forms);
        }

        // 사용자 등록
        if($project_id) {
            DB::table("module_team_users")
                ->insertGetId([
                    'created_at' => $todayTime,
                    'updated_at' => $todayTime,
                    'n_id' => $project_id,
                    'm_id' => $user_id,
                    'user_id' => $user_id
                ]);
        }

        $this->inlineAdd = false;

        // Livewire를 갱신을 호출합니다.
        $this->emit('refesh');
    }
}
