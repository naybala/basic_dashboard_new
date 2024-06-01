<x-master-layout name="User" headerName="{{ __('sidebar.user') }}">
    <main class="h-full overflow-y-auto">
        <br>
        <div class="hidden" id="loadingFalse">
            <div class="container px-6 mx-auto grid">
                <x-common.errorReval />
                <div
                    class="grid gap-2 mb-4 mt-4 md:grid-cols-1 xl:grid-cols-1 bg-white rounded-lg shadow-md py-2 mx-0 md:mx-5 px-1 md:px-16 lg:px-40 md:py-10 dark:bg-gray-800">
                    <div class="px-4 py-3 mb-4 dark:bg-gray-800">
                        <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="grid gap-2 md:grid-cols-2 xl:grid-cols-2">
                                {{-- name and email --}}
                                <div>
                                    {{-- name --}}
                                    <div class="mb-4 py-2">
                                        <x-common.label :title="__('user.name')" for="name" />
                                        <x-common.inputLg type="text" id="name" name="name"
                                            :placeHolder="__('user.placeholder_name')" />
                                    </div>
                                    {{-- name --}}
                                    {{-- email --}}
                                    <div class="mb-4 py-2">
                                        <x-common.label :title="__('user.email')" for="email" />
                                        <x-common.inputLg type="email" id="email" name="email"
                                            :placeHolder="__('user.placeholder_email')" />
                                    </div>
                                    {{-- email --}}
                                </div>
                                {{-- name and email --}}
                                {{-- password and status --}}
                                <div>
                                    {{-- password --}}
                                    <div class="mb-4 py-2">
                                        <x-common.label :title="__('user.password')" for="password" />
                                        <div class="relative">
                                            <x-common.inputLg type="password" id="password" name="password"
                                                :placeHolder="__('user.placeholder_password')" />
                                            <x-common.loginEyes togglePassword="togglePassword" showEyes="showEyes"
                                                removeEyes="removeEyes" />
                                        </div>
                                    </div>
                                    {{-- password --}}
                                    {{-- Status --}}
                                    <div class="mb-4 py-2">
                                        <x-common.label :title="__('user.status')" for="status" />
                                        <select class="{{ config('config.sampleForm.selectBox') }}" name="status"
                                            placeholder="Description" value="{{ old('status') }}">
                                            <option value="1" @if (old('status') == '1') selected @endif>
                                                Active</option>
                                            <option value="0" @if (old('status') == '0') selected @endif>
                                                Inactive</option>
                                        </select>
                                    </div>
                                    {{-- Status --}}
                                </div>
                                {{-- password and status --}}
                            </div>
                            <br />
                            <x-common.saveUpdateCancel :operate="__('messages.save')" :cancel="__('messages.cancel')" url="users.index" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <x-common.loading></x-common.loading>
    </main>
    @vite('resources/js/common/loginEyes.js')
</x-master-layout>
