<div>
    <!-- Livewire loading indicator -->
    <x-loading-star />

    <div class="col-lg-6 col-md-6 col-12">
        @foreach ($rows as $row)
            <article class="col-lg-6 col-md-6 col-12">
                <figure class="mb-4 zoom-img">
                    <a href="./blog-single.html">
                        <img src="./assets/images/blog/blog-img-9.jpg" alt="blog" class="img-fluid rounded-3">
                    </a>
                </figure>

                <a href="#!" class="badge bg-primary-subtle text-primary-emphasis text-uppercase">
                    Digital
                </a>
                <h3 class="my-3 lh-base h4">
                    <a href="#" class="text-reset"
                        wire:click="edit({{ $row->id }})">
                        {{ $row->title }}
                    </a>
                </h3>
                <div>
                    {{ $row->description }}
                </div>
                <div class="flex items-center">
                    <div>
                        @foreach ($row->users as $uid)
                            {{ $uid }}
                        @endforeach
                    </div>
                    <div>
                        <a href="#" wire:click="$emit('projectUserAdd', '{{ $row->id }}')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                <path fill-rule="evenodd"
                                    d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-3 mb-md-0">
                    <div class="d-flex align-items-center">
                        <img src="./assets/images/avatar/avatar-7.jpg" alt="Avatar"
                            class="avatar avatar-xs rounded-circle">
                        <div class="ms-2">
                            <a href="#" class="text-reset fs-6">Sandip Chauhan</a>
                        </div>
                    </div>
                    <div class="ms-3"><span class="fs-6">Dec 21, 2023</span></div>
                </div>
            </article>
        @endforeach
    </div>


</div>
