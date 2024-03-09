<div>
    <div class="row">
        @foreach ($rows as $item)
        <div class="col-6">
            <div class="card">
                {{$item->title}}
            </div>
        </div>
        @endforeach
    </div>

    @if(!$inlineAdd)
    <div class="d-flex justify-content-center mt-3">
        <span wire:click="create">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
            </svg>
        </span>
    </div>
    @else
    <div class="mb-3 mt-3">
        <label class="form-label">신규 프로젝트</label>
        <div class="input-group">
            <input type="text" class="form-control"
                placeholder="프로젝트명을 입력해 주세요"
                aria-label="프로젝트명을 입력해 주세요"
                wire:model.defer="forms.title">
            <button class="btn btn-dark" type="button" wire:click="store">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
                </svg>
            </button>
        </div>
    </div>
    @endif

</div>
