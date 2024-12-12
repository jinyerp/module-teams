<?php
namespace Jiny\Erp\Teams;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\Support\Facades\File;
use Livewire\Livewire;

class JinyErpTeamServiceProvider extends ServiceProvider
{
    private $package = "jiny-erp-teams";
    public function boot()
    {
        // 모듈: 라우트 설정
        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');
        $this->loadViewsFrom(__DIR__.'/Resources/views', $this->package);

        // 데이터베이스
        $this->loadMigrationsFrom(__DIR__.'/Databases/migrations');

    }

    public function register()
    {
        /* 라이브와이어 컴포넌트 등록 */
        $this->app->afterResolving(BladeCompiler::class, function () {

            Livewire::component('TeamSidebar', \Jiny\Erp\Teams\Http\Livewire\TeamSidebar::class);
            Livewire::component('MyTeamProjectLists', \Jiny\Erp\Teams\Http\Livewire\MyTeamProjectLists::class);

            Livewire::component('ProjectDetail', \Jiny\Erp\Teams\Http\Livewire\ProjectDetail::class);

            // 프로젝트에 참여하는 구성원 관리
            Livewire::component('TeamUsers', \Jiny\Erp\Teams\Http\Livewire\TeamUsers::class);

            Livewire::component('TeamInvite', \Jiny\Erp\Teams\Http\Livewire\TeamInvite::class);
            Livewire::component('TeamList', \Jiny\Erp\Teams\Http\Livewire\TeamList::class);


        });
    }
}
