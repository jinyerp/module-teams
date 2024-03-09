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
class TeamUsers extends Component
{
    private $tablename = "team_users";
    public $project_id;
    public $project=[];

    public $user_id;
    public $message;

    public function mount()
    {
        $this->user_id = Auth::user()->id;

        $project = DB::table("teams")->where('id', $this->project_id)->first();
        foreach($project as $key => $value) {
            $this->project[$key] = $value;
        }
    }

    public function render()
    {
        $users = [];

        $rel = DB::table($this->tablename)->where('n_id', $this->project_id)->get();

        $ids=[];
        foreach($rel as $item) {
            $ids []= $item->m_id; // 팀사용자

            $key = $item->m_id;
            foreach($item as $k => $v) {
                $users[$key][$k] = $item->$k;
            }
            //$users[$key]['id'] = $item->m_id;
            //$users[$key]['role'] = $item->role;
        }

        //dd($users);

        // team_project_users값을 user로 확장합니다.
        $rows = DB::table('users')->whereIn('id',$ids)->get();
        foreach($rows as $item) {
            $key = $item->id;
            $users[$key]['email'] = $item->email;
            $users[$key]['name'] = $item->name;
            /*
            foreach($rel as $row) {
                if($item->id == $row->m_id) {
                    $item->role = $row->role;
                }
            }
            */
        }

        //dd($users);

        // 아바타 이미지
        //$avatas = DB::table('account_avata')->whereIn('user_id',$ids)->get();
        return view("teams::livewire.users",[
            'users' => $users
        ]);

    }

    protected $listeners = [
        'refeshTeamUsers'
    ];

    public function refeshTeamUsers()
    {
    }

    public $popupForm = false;
    public $forms=[];
    public $team_id;
    //public $team_user_id;
    public $team_owner;

    public function edit($id)
    {
        $this->team_id = $id;
        //dump($id);
        //dump($this->project_id);

        // 선택한 팀원의 관계정보 읽기
        $row = DB::table('team_users')
            //->where('n_id',$this->project_id)
            //->where('m_id',$id)
            ->where('id',$id)
            ->first();

        //dd($row);

        // 프로젝트의 소유자가, 현재의 팀원인지
        if($row->m_id == $this->project['user_id']) {
            $this->team_owner = true;
        } else {
            $this->team_owner = false;
        }

        //$this->team_user_id = $row->m_id;

        foreach($row as $key => $value) {
            $this->forms[$key] = $value;
        }

        $this->popupForm = true;
    }

    public function update()
    {
        unset($this->forms['id']); // Duplicate key 'PRIMARY'

        DB::table('team_users')
            ->where('id',$this->team_id)
            ->update($this->forms);

        // owner 수정
        if($this->team_owner) {
            DB::table('teams')
            ->where('id',$this->project_id)
            ->update(['user_id'=>$this->forms['m_id']]);

            // 갱신: mount로 1번만 실행되기 때문
            $this->project['user_id'] = $this->forms['m_id'];
        }

        $this->team_id = null;
        $this->forms = [];
        $this->popupForm = false;

        // Livewire를 갱신을 호출합니다.
        $this->emit('refeshTeamInvite');
    }

    public function remove($id)
    {
        DB::table($this->tablename)
            ->where('n_id', $this->project_id)
            ->where('m_id', $id)
            ->delete();
    }

}
