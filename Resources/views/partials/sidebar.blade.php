<!-- Responsive offcanvas body START -->
<div class="offcanvas-lg offcanvas-start h-100" tabindex="-1" id="offcanvasSidebar">

    <!-- Offcanvas header -->
    <div class="offcanvas-header bg-light">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Projects</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasSidebar"
            aria-label="Close"></button>
    </div>

    <!-- Offcanvas body -->
    <div class="offcanvas-body p-0">
        <div class="card border p-3 w-100">
            <!-- Card header -->
            <div class="card-header text-center border-bottom bg-white">

                <!-- Avatar -->
                <div class="position-relative mb-2">
                    <x-avata src="/account/avatas/{{Auth::user()->id}}"/>
                    <a href="#"
                        class="btn btn-sm btn-round btn-dark position-absolute top-50 start-100 translate-middle mt-4 ms-n3"
                        data-bs-toggle="tooltip" data-bs-title="Edit profile">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                </div>

                <h6 class="mb-0">{{Auth::user()->name}}</h6>
                <a href="#" class="text-reset text-primary-hover small">{{Auth::user()->email}}</a>

            </div>

            <!-- Card body START -->
            <div class="card-body p-0 mt-4">

                @livewire('TeamSidebar',[])
                <!-- Sidebar menu item END -->
            </div>
            <!-- Card body END -->
        </div>
    </div>
</div>
