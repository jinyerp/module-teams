<?php

namespace Modules\Teams\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Jiny\WireTable\Http\Controllers\LiveController;
class ProjectController extends LiveController
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        // 테이블 정보
        $this->actions['table'] = "teams";

        // layout->table->list
        $this->actions['view']['layout'] = "www::teams.projects.layout";
        $this->actions['view']['table'] = "www::teams.projects.table";
        $this->actions['view']['list'] = "www::teams.projects.list";

        // popup
        $this->actions['view_form'] = "www::teams.projects.form";

    }


    /**
     * 목록 표시 및 Hook
     */
    public function index(Request $request)
    {
        return parent::index($request);
    }

    ## Hook
    ## 데이터를 검색하기 위한 조건등을 설정합니다. (dbFetch 전에 실행)
    public function hookIndexing($wire)
    {
        /*
        // 현재 로그인한 userid를 검색
        $user = Auth::user();
        $rels = DB::table('team_project_users')->where('n_id', $user->id)->get();

        $ids = [];
        foreach($rels as $item) {
            $ids []= $item->m_id;
        }

        // 자신이 속한 프로젝트만 추출
        $wire->database()->whereIn('id',$ids);
        */

        // return
        // 반환값이 있으면, 종료됩니다.
    }

    ## 목록 데이터를 fetch 후에 실행됩니다.
    public function hookIndexed($wire, $rows)
    {
        // 프로젝트 사용자 정보
        // -----
        /*
        $ids = [];
        foreach($rows as $item) {
            $ids []= $item->id;
        }
        // 프로젝트 소속 회원정보
        $projectUsers = DB::table('team_project_users')->whereIn('m_id', $ids)->get();

        foreach($rows as $i=>$item) {
            $rows[$i]->users = [];
            foreach($projectUsers as $user) {
                if($item->id == $user->m_id) {
                    // 프로젝트별 권한 사용자 추출
                    $rows[$i]->users []= $user->n_id;
                }
            }

            // 파일수 체크
            $files = 0;
            $path = storage_path('app/translate')."/".$item->code;

            $dir = scandir($path);
            foreach($dir as $name) {
                if($name == "." || $name == "..") continue;
                $files++;
            }
            $rows[$i]->files = $files;

        }
        */







        return $rows;

    }

    /**
     * Creating Livewire Popup
     */
    ## 생성폼이 실행될때 호출, 폼 초기화 작업을 합니다.
    public function hookCreating($wire, $value)
    {
        /*
        $form = []; //초기값

        // 인증 사용자 id를 추가합니다.
        $user = Auth::user();
        if($user) {
            $form['user_id'] = $user->id;
        }
        */

        return $form; // 설정시 form 입력 초기값으로 설정됩니다.
    }



    ## 신규 데이터 DB 삽입전에 호출됩니다.
    public function hookStoring($wire,$form)
    {
        //$form['code'] = substr(sha1($form['title']), 0, 10);
        return $form; // 사전 처리한 데이터를 반환합니다.
    }

    ## 신규 데이터 DB 삽입후에 호출됩니다.
    public function hookStored($wire, $form)
    {
        /*
        // 신규 삽입된 id 읽기
        $lastInsertedId = $form['id'];

        // 프로젝트 사용자 관계설정 추가
        DB::table('team_project_users')->insert([
            'n_id' => $form['user_id'],
            'm_id' => $lastInsertedId,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        // 번역 프로젝트 폴더 생성
        if($form['title']) {
            $path = storage_path('app/translate');
            if(!is_dir($path)) mkdir($path); //저장소 생성

            // 해쉬키로 폴더 생성
            $hash = substr(sha1($form['title']), 0, 10);
            if(!is_dir($path.'/'.$hash)) mkdir($path.'/'.$hash);

            // 임시코드
            // 코드값을 해쉬키로 변경해서 저장함
            DB::table("team_projects")->where('id', $lastInsertedId )->update(['code'=>$hash]);
        }
        */

    }


    public function hookUpdating($wire, $form, $old)
    {
        /*
        // 타이틀명 수정여부 검사
        if($form['title'] != $old['title']) {

            // 해쉬키 변경
            $newHash = substr(sha1($form['title']), 0, 10);
            $oldHash = substr(sha1($old['title']), 0, 10);
            $form['code'] = $newHash;

            // 폴더명 변경
            $path = storage_path('app/translate');
            rename($path.'/'.$oldHash, $path.'/'.$newHash);
        }
        */
        return $form;
    }


    /**
     * 삭제
     */
    ## delete 동직이 실행된후 호출됩니다.
    public function hookDeleted($wire, $row)
    {
        /*
        // M:N 관계 삭제
        $tablename = 'team_project_users';
        DB::table($tablename)->where('m_id', $row['id'])->delete();

        $hash = substr(sha1($row['title']), 0, 10);
        $path = storage_path('app/translate');
        rmdir($path.'/'.$hash);
        */

        return $row;
    }
}
