<div>
    <x-table-loading-indicator/>

    <div class="card border-0 mb-4 shadow-sm">
        <div class="card-body p-lg-5">
            <div class="mb-5">
                <h4 class="mb-1">팀 멤버</h4>
                <p class="mb-0 fs-6">List of member are in your team with its roles.</p>
            </div>
            <div class="table-responsive">
                <table class="table table-centered td table-centered th table-lg text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col">
                                <div class="fs-6 text-dark fw-semibold">Member</div>
                            </th>
                            <th scope="col">
                                <div class="fs-6 text-dark fw-semibold">Role</div>
                            </th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="/account/avatas/{{ $item['m_id'] }}" alt="avatar"
                                            class="avatar avatar-lg rounded-circle">

                                        <div class="ms-3">
                                            <div class="fs-5 fw-semibold text-dark">{{ $item['name'] }}</div>
                                            <small>{{ $item['email'] }}</small>
                                        </div>

                                    </div>
                                </th>
                                <td><span>{{$item['role']}}</span></td>
                                <td></td>
                                <td>
                                    @if ($project['user_id'] == $item['m_id'])
                                        <span>Owner</span>
                                    @else
                                        @if($project['user_id'] == Auth::user()->id)
                                            <a href="#" class="btn btn-sm btn-dark me-2"
                                            wire:click="edit({{$item['id']}})">Edit</a>
                                            <a href="#" class="btn btn-sm btn-light"
                                            wire:click="remove({{$item['id']}})">Remove</a>

                                        @else
                                        <span>Member</span>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- 팝업 데이터 수정창 -->
    @if ($popupForm)
    <x-wire-dialog-modal wire:model="popupForm" maxWidth="3xl">

        <x-slot name="title">
            역할수정
        </x-slot>

        <x-slot name="content">

            <!-- Checkboxes-->
            <div class="mt-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="customCheck1"
                    wire:model.defer="team_owner">
                    <label class="form-check-label" for="customCheck1">Team Owner</label>
                </div>
            </div>

            <label for="formGroupRoleInput" class="form-label">Role</label>
            <select class="form-select" id="formGroupRoleInput" required=""
                        wire:model.defer="forms.role">
                        <option selected="" disabled="" value="">Role</option>
                        <option value="Owner">Owner</option>
                        <option value="Front End Developer">Front End Developer</option>
                        <option value="Full Stack Developer">Full Stack Developer</option>
            </select>
        </x-slot>

        <x-slot name="footer">
            {{-- 수정버튼 --}}
            <button type="button" class="btn btn-secondary"
                        wire:click="popupFormClose">취소</button>
            <button type="button" class="btn btn-info"
                        wire:click="update">수정</button>
        </x-slot>
    </x-wire-dialog-modal>
    @endif

</div>
