<x-www-app>
    <x-www-layout>
        <x-www-main>
            <h1>팀 관리</h1>

            <!-- 내가 가입된 팀목록-->
            @livewire('TeamList',['user_id'=>Auth::user()->id])
        </x-www-main>
    </x-www-layout>
</x-www-app>

