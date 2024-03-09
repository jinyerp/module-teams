<div>

            <!-- 관리코드 -->
            {{--
            <div class="space-y-1">
                <label class="font-medium" for="name">코드:</label>
                <input type="text" name="code" wire:model.defer="forms.code"
                class="block w-full px-3 py-2 leading-6 border border-gray-200 rounded focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:ring-opacity-50"
                placeholder="code">
            </div>
            --}}

            <div class="space-y-1">
                <label class="font-medium" for="name">타이틀:</label>
                <input type="text" name="title" wire:model.defer="forms.title"
                class="block w-full px-3 py-2 leading-6 border border-gray-200 rounded focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:ring-opacity-50"
                placeholder="code">
            </div>

            <div class="space-y-1">
                <label class="font-medium" for="name">소스언어(src):</label>
                <input type="text" name="src_lang" wire:model.defer="forms.src_lang"
                class="block w-full px-3 py-2 leading-6 border border-gray-200 rounded focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:ring-opacity-50"
                placeholder="code">
            </div>

            <div class="space-y-1">
                <label class="font-medium" for="name">대상언어(dst):</label>
                <input type="text" name="dst_lang" wire:model.defer="forms.dst_lang"
                class="block w-full px-3 py-2 leading-6 border border-gray-200 rounded focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:ring-opacity-50"
                placeholder="code">
            </div>

            <div class="space-y-1">
                <label class="font-medium" for="name">만기일:</label>
                <input type="text" name="expire" wire:model.defer="forms.expire"
                class="block w-full px-3 py-2 leading-6 border border-gray-200 rounded focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:ring-opacity-50"
                placeholder="code">
            </div>

            <div class="space-y-1">
                <label class="font-medium" for="name">상태:</label>
                <input type="text" name="status" wire:model.defer="forms.status"
                class="block w-full px-3 py-2 leading-6 border border-gray-200 rounded focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:ring-opacity-50"
                placeholder="code">
            </div>

            <div class="space-y-1">
                <label class="font-medium" for="name">참조:</label>
                <input type="text" name="reference" wire:model.defer="forms.reference"
                class="block w-full px-3 py-2 leading-6 border border-gray-200 rounded focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:ring-opacity-50"
                placeholder="code">
            </div>



            <!-- Textarea -->
            <div class="space-y-1">
                <label class="font-medium" for="tk-form-elements-textarea">설명:</label>
                <textarea name="description" id="" cols="30" rows="10" wire:model.defer="forms.description"
                class="block w-full px-3 py-2 border border-gray-200 rounded focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:ring-opacity-50" placeholder="프로젝트 설명"></textarea>
            </div>
            <!-- END Textarea -->






</div>
