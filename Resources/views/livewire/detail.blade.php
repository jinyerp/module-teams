<div>
    @if(!$editMode)
    <!-- Title and offcanvas button -->
    <div class="d-flex justify-content-between align-items-center ">
        <!-- Title -->
        <h1 class="h3 mb-0">
            {{$row->title}}
            <span wire:click="turnEditMode">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg>
            </span>
        </h1>

        <!-- Advanced filter responsive toggler START -->
        <button class="btn btn-primary d-lg-none flex-shrink-0 ms-2" type="button"
            data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar"
            aria-controls="offcanvasSidebar">
            <i class="fas fa-sliders-h"></i> Menu
        </button>
        <!-- Advanced filter responsive toggler END -->
    </div>

    <p class="mb-5 mb-sm-6">
        {{$row->description}}
    </p>

    @else
    <div class="card mb-5 mb-sm-6">
        <div class="card-header">
            <h4 class="header-title">프로젝트 수정</h4>
            <p class="text-muted font-14">
                등록된 프로젝트 정보를 수정할 수 있습니다.
            </p>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">프로젝트명</label>
                <input type="text" class="form-control"
                        placeholder="프로젝트 이름을 적어 주세요"
                        aria-label="프로젝트 이름을 적어 주세요"
                        wire:model="forms.title">
            </div>
            <div class="mb-3">
                <label for="example-textarea" class="form-label">상세설명</label>
                <textarea class="form-control" id="example-textarea" rows="5"
                wire:model="forms.description"></textarea>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between align-items-center ">
                <div>
                    <button class="btn btn-danger" wire:click="delete">삭제</button>
                </div>
                <div>
                    <button class="btn btn-secondary" wire:click="calcel">취소</button>
                    <button class="btn btn-primary" wire:click="update">변경</button>
                </div>


            </div>
        </div>
    </div>

    @endif



</div>
