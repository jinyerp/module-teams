<div>
    <!-- Livewire loading indicator -->
    <x-loading-star />

    <x-table>
        <!-- Table Header -->
        <thead>
            <tr>
                <x-th class="w-16">Id</x-th>
                <x-th>코드 /설명</x-th>
                <x-th class="w-32">담당자</x-th>

                <x-th class="w-32">Pages 번역</x-th>
                <x-th class="w-64">전체</x-th>

                <x-th class="w-32">수정일자</x-th>
            </tr>
        </thead>
        <!-- END Table Header -->

        <!-- Table Body -->
        <tbody>
            @foreach($rows as $row)
            <tr class="border-b border-gray-100 hover:bg-gray-50">
                <x-td-center class="w-16">
                    {{ $row->id }}
                </x-td-center>

                <x-td>
                    <div>
                        <a
                        href="#"
                        class="font-bold text-blue-500 hover:underline"
                        wire:click="$emit('popupEdit','{{$row->id}}')">
                            {{ $row->code }}
                        </a>
                    </div>
                    <div>
                        {{ $row->description }}
                    </div>
                </x-td>
                <x-td-center class="w-32">
                    {{ $row->owner }}
                </x-td-center>


                <x-td-center class="w-32">
                    <a href="/jinyerp/tms/docs/{{$row->code}}" class="flex items-center justify-center space-x-2">
                        <span>
                            {{ $row->pages }}
                        </span>

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                        </svg>
                    </a>
                </x-td-center>

                <x-td class="w-64">
                    <!-- Progress Bar: Simple With Label -->
                    @php
                        if($row->finish != 0 || $row->total != 0) {
                            $percent = sprintf("%.1f", $row->finish / $row->total * 100);
                        } else {
                            $percent = 0;
                        }

                    @endphp
                    <div class="flex items-center w-full h-5 overflow-hidden bg-blue-100 rounded-lg">
                        <div
                        role="progressbar"
                        aria-valuenow="40"
                        aria-valuemin="0"
                        aria-valuemax="100"
                        class="flex items-center self-stretch justify-center text-sm font-semibold text-white transition-all duration-500 ease-out bg-blue-500"
                        style="width: {{$percent}}%;"
                        >
                        {{$percent}}%
                        </div>
                    </div>
                    <!-- END Progress Bar: Simple With Label -->

                    <div class="text-center">
                        finish : {{ $row->finish }} / Total : {{ $row->total }} , {{$percent}}%
                    </div>

                </x-td>


                <x-td-center class="w-32">
                    {{ $row->updated_at }}
                </x-td-center>
            </tr>
            @endforeach

        </tbody>
        <!-- END Table Body -->
    </x-table>

</div>
