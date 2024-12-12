<?php
namespace Jiny\Erp\Teams\Http\Livewire;

use Illuminate\Contracts\Container\Container;
use Illuminate\Routing\Route;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

// 테이블 필드를 리스트 목록으로 출력합니다.
class ProjectDetail extends Component
{
    private $tablename = "erp_teams";

    public $project_id;
    public $forms=[];

    public $editMode = false;

    public function render()
    {
        $row = DB::table($this->tablename)->where('id', $this->project_id)->first();

        return view("jiny-erp-teams::livewire.detail",[
            'row' => $row
        ]);
    }

    public function turnEditMode()
    {
        $row = DB::table($this->tablename)->where('id', $this->project_id)->first();
        foreach($row as $key => $value) {
            $this->forms[$key] = $value;
        }
        $this->editMode = true;
    }

    public function calcel()
    {
        $this->editMode = false;
    }

    public function update()
    {
        DB::table($this->tablename)->where('id', $this->project_id)->update($this->forms);
        $this->editMode = false;

        // Livewire Table을 갱신을 호출합니다.
        $this->emit('refeshTable');
    }

    public function delete()
    {
        $this->editMode = false;

        DB::table($this->tablename)->where('id', $this->project_id)->delete();

        // 다른 페이지로 이동하는 JavaScript 코드를 실행합니다.
        //$this->dispatchBrowserEvent('livewireRedirectToPage', ['url' => '/team/projects']);
        return redirect()->to('/teams');
    }

}
