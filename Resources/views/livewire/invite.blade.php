<div>
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-lg-5">
            <div class="mb-5">
                <h4 class="mb-1">Add team members</h4>
                <p class="fs-6 mb-0">Invite as many team members as you need to help run this account. Learn More</p>
            </div>
            <form class="row g-3 needs-validation" novalidate="">
                <div class="col-lg-6 col-md-12">
                    <label for="formGroupEmailInput" class="form-label">Email</label>
                    <input type="email" class="form-control" id="formGroupEmailInput"
                        required=""
                        wire:model.defer="forms.email">
                    <div class="invalid-feedback">Please enter an email.</div>
                </div>
                <div class="col-lg-6 col-md-12">

                    {{-- <label for="formGroupRoleInput" class="form-label">Role</label>
                    <select class="form-select" id="formGroupRoleInput" required=""
                        wire:model.defer="forms.role">
                        <option selected="" disabled="" value="">Role</option>
                        <option value="Owner">Owner</option>
                        <option value="Front End Developer">Front End Developer</option>
                        <option value="Full Stack Developer">Full Stack Developer</option>
                    </select> --}}
                </div>
                <div class="col-12">
                    @if($message)
                        <div class="mb-4 text-sm font-medium text-red-600">{{$message}}</div>
                    @endif

                    <button class="btn btn-primary" wire:click="inviteNewMember">팀 추가</button>
                </div>
            </form>
        </div>
    </div>
</div>
