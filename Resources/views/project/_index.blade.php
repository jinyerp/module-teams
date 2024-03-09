@setTheme("admin.sidebar")
<x-theme theme="admin.sidebar">
    <x-theme-layout>

        <x-btn-emitCreate>
            <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                class="inline-block w-5 h-5 opacity-50 hi-solid hi-plus">
                <path fill-rule="evenodd"
                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                    clip-rule="evenodd"></path>
            </svg>
            <span>신규추가</span>
        </x-btn-emitCreate>

        @livewire('LivewireTable', ['actions'=>$actions])

        @livewire('LivewireFormPopup', ['actions'=>$actions])

        {{-- 프로젝트 구성원 추가 --}}
        {{-- @livewire('TransProjectUser') --}}

    </x-theme-layout>
</x-theme>
