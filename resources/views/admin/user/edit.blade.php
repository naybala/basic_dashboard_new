<x-master-layout name="User" headerName="{{ __('sidebar.user') }}">
    <main class="h-full overflow-y-auto">
        <br>
        <div class="hidden" id="loadingFalse">
            <div class="container px-6 mx-auto grid">
                <x-common.errorReval />
                <x-common.exceptionError />
                <div
                    class="grid gap-2 mb-4 mt-4 md:grid-cols-1 xl:grid-cols-1 bg-white rounded-lg shadow-md py-2 mx-0 md:mx-5 px-1 md:px-16 lg:px-40 md:py-10 dark:bg-gray-800">
                    <div class="px-4 py-3 mb-4 dark:bg-gray-800">

                        <form action="{{ route('users.update', $data['id']) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="grid gap-2 md:grid-cols-2 xl:grid-cols-2">
                                <input type="hidden" name="id" value="{{ $data['id'] }}">
                                {{-- name --}}
                                <div class="mb-4 py-2">
                                    <x-common.label :title="__('user.name')" for="name" />
                                    <x-common.inputLg type="text" id="name" name="name" :placeHolder="__('user.placeholder_name')"
                                        :value="$data['name']" />
                                </div>
                                {{-- name --}}
                                {{-- email --}}
                                <div class="mb-4 py-2">
                                    <x-common.label :title="__('user.email')" for="email" />
                                    <x-common.inputLg type="email" id="email" name="email" :placeHolder="__('user.placeholder_email')"
                                        :value="$data['email']" />
                                </div>
                                {{-- email --}}
                            </div>

                            <div class="grid gap-2 md:grid-cols-2 xl:grid-cols-2">
                                {{-- old password --}}
                                <div class="mb-4 py-2">
                                    <x-common.label :title="__('user.old_password')" for="password" />
                                    <div class="relative" id="root-password">
                                        <x-common.inputLg type="password" id="password" name="password"
                                            :placeHolder="__('user.placeholder_old_password')" />
                                        <x-common.loginEyes togglePassword="togglePassword" showEyes="showEyes"
                                            removeEyes="removeEyes" />
                                    </div>
                                </div>
                                {{-- new password --}}
                                <div class="mb-4 py-2">
                                    <x-common.label :title="__('user.new_password')" for="new-password" />
                                    <div class="relative" id="root-password">
                                        <x-common.inputLg type="password" id="new-password" name="newPassword"
                                            :placeHolder="__('user.placeholder_new_password')" />
                                        <x-common.loginEyes togglePassword="togglePasswordTwo" showEyes="showEyesTwo"
                                            removeEyes="removeEyesTwo" />
                                    </div>
                                </div>
                            </div>
                            {{-- new password --}}
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


                            <br />
                            <x-common.saveUpdateCancel :operate="__('messages.update')" :cancel="__('messages.cancel')" url="users.index" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <x-common.loading></x-common.loading>
    </main>
    @vite('resources/js/common/loginEyes.js')
    @vite('resources/js/common/loginEyesNew.js')

</x-master-layout>
