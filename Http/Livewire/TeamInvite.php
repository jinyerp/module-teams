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
class TeamInvite extends Component
{
    private $tablename = "team_users";
    public $project_id;
    public $forms=[];
    public $message;
    public $project=[];

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
        if($this->project['user_id'] == $this->user_id) {
            return view("teams::livewire.invite");
        }

        return view("teams::livewire.none");
    }

    public function inviteNewMember()
    {
        $this->message=null; // 초기화

        if(isset($this->forms['email']) && $this->forms['email']) {
            $user = DB::table('users')->where('email', $this->forms['email'])->first();
            //dd($user);
            if($user) {

                // 2. 시간정보 생성
                $this->forms['created_at'] = date("Y-m-d H:i:s");
                $this->forms['updated_at'] = date("Y-m-d H:i:s");
                $this->forms['n_id'] = $this->project_id;

                $this->forms['m_id'] = $user->id;
                $this->forms['email'] = $user->email;

                //dd($this->forms);
                $isUser = DB::table($this->tablename)
                    ->where('n_id', $this->project_id)
                    ->where('m_id', $user->id)
                    ->first();
                if($isUser) {
                    $this->message = "등록된 회원입니다.";
                    //session()->flush('message', "");
                } else {
                    $id = DB::table($this->tablename)->insertGetId($this->forms);
                    if($id) {
                        // 성공
                        $this->forms = [];
                    }
                }

            } else {
                $this->message = "이 회원은 등록이 제한됩니다.";
                //session()->flash('message', "이 회원은 등록이 제한됩니다.");
            }
        } else {
            $this->message = "이메일 주소를 입력해 주세요.";
            //session()->flush('message', "이메일 주소를 입력해 주세요.");
        }


        // Livewire Table을 갱신을 호출합니다.
        $this->emit('refeshTeamUsers');
    }

    protected $listeners = [
        'refeshTeamInvite'
    ];

    public function refeshTeamInvite()
    {
    }

}
