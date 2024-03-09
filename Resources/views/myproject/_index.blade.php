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
                        @include('www::teams.partials.sidebar')

                    </div>

                    <!-- Main content -->
                    <div class="col-lg-9">
                        <!-- Title and offcanvas button -->
                        <div class="d-flex justify-content-between align-items-center mb-5 mb-sm-6">
                            <!-- Title -->
                            <h1 class="h3 mb-0">{{$project->title}}</h1>

                            <!-- Advanced filter responsive toggler START -->
                            <button class="btn btn-primary d-lg-none flex-shrink-0 ms-2" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar"
                                aria-controls="offcanvasSidebar">
                                <i class="fas fa-sliders-h"></i> Menu
                            </button>
                            <!-- Advanced filter responsive toggler END -->
                        </div>

                        <!-- 프로젝트 설명-->
                        <p>
                            {{$project->description}}
                        </p>

                        <!-- Search and buttons -->
                        <div class="row g-3 align-items-center mb-5">
                            <!-- Search -->
                            <div class="col-xl-5">
                                <form class="rounded position-relative">
                                    <input class="form-control pe-5" type="search" placeholder="Search"
                                        aria-label="Search">
                                    <button
                                        class="btn border-0 px-3 py-0 position-absolute top-50 end-0 translate-middle-y"
                                        type="submit"><i class="fas fa-search fs-6"></i></button>
                                </form>
                            </div>

                            <!-- Select option -->
                            <div class="col-sm-6 col-xl-3 ms-auto">
                                <!-- Short by filter -->
                                <form>
                                    <select class="form-select js-choice" aria-label=".form-select-sm">
                                        <option>Sort by</option>
                                        <option selected="">Published</option>
                                        <option>Free</option>
                                        <option>Newest</option>
                                        <option>Oldest</option>
                                    </select>
                                </form>

                            </div>

                            <!-- Button -->
                            <div class="col-sm-6 col-xl-3">
                                <a href="#" class="btn btn-primary mb-0" id="btn-livepopup-create">
                                    <i class="bi bi-plus-lg me-2"></i>
                                    프로젝트 추가
                                </a>
                            </div>
                        </div>

                        <!-- 프로젝트 팀 멤버-->
                        <p>프로젝트 팀 멤버</p>
                        {{-- @livewire('MyTeamProjectLists') --}}



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

        <script src="//unpkg.com/alpinejs" defer></script>
    @endpush
</x-www-layout>
