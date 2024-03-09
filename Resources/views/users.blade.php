<x-www-layout>
    @push('css')
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @endpush

    <main>
        <section class="py-lg-7 py-5 bg-light-subtle" style="padding-top: 2.5rem;">
            <div class="container pt-3 pt-xl-5">
                <div class="row">
                    <!-- Sidebar -->
                    <div class="col-lg-3">
                        @include('teams::partials.sidebar')

                    </div>

                    <!-- Main content -->
                    <div class="col-lg-9">
                        <!-- 프로젝트 설명-->
                        @livewire('ProjectDetail',[
                            'project_id'=>$project->id
                        ])

                        <!-- 프로젝트 팀 멤버-->
                        @if(isTeamOwner($project))
                        @livewire('TeamInvite',[
                            'project_id'=>$project->id
                        ])
                        @endif

                        <!-- 프로젝트 팀 멤버-->
                        @livewire('TeamUsers',[
                            'project_id'=>$project->id
                        ])

                    </div>
                </div>
            </div>
        </section>
    </main>


    @push('scripts')
        <script>
            document.querySelector("#btn-livepopup-create")
            .addEventListener("click",function(e){
                e.preventDefault();
                console.log("livewire emit to create method");
                Livewire.emit('create');

            });
        </script>


        <script>
            // Livewire 이벤트를 수신하여 페이지 이동을 처리합니다.
            document.addEventListener('livewire:load', function () {
                Livewire.on('livewireRedirectToPage', function (data) {
                    window.location.href = data.url;
                });
            });
        </script>


        <script src="//unpkg.com/alpinejs" defer></script>
    @endpush
</x-www-layout>
