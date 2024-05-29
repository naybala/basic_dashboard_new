<x-master-layout name="Operator" headerName="{{ __('sidebar.user') }}">
    <main class="h-full overflow-y-auto">
        <br>
        <div class="hidden" id="loadingFalse">
            <div class="container px-6 mx-auto grid">
                @if (Session::has('error'))
                    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert"
                        id="validateDisapper">
                        <ul>
                            <li>User Account Info Required</li>
                        </ul>
                    </div>
                @endif
                <div
                    class="grid gap-2 mb-4 mt-4 md:grid-cols-1 xl:grid-cols-1 bg-white rounded-lg shadow-md py-2 mx-0 md:mx-5 px-1 md:px-16 lg:px-40 md:py-10 dark:bg-gray-800">
                    <div class="px-4 py-3 mb-4 dark:bg-gray-800">
                        <form action="{{ route('users.store') }}" method="post">
                            @csrf

                            <div class="grid gap-2 md:grid-cols-2 xl:grid-cols-2">
                                <div>
                                    <div class="mb-4 py-2">
                                        <x-common.label :title="__('user.name')" for="name" />
                                        <x-common.inputLg type="text" id="name" name="name"
                                            :placeHolder="__('user.placeholder_name')" />
                                    </div>

                                    <div class="mb-4 py-2">
                                        <x-common.label :title="__('user.email')" for="email" />
                                        <x-common.inputLg type="email" id="email" name="email"
                                            :placeHolder="__('user.placeholder_email')" />
                                    </div>


                                </div>
                                <div>
                                    <div class="mb-4 py-2">
                                        <x-common.label :title="__('user.password')" for="password" />
                                        <div class="relative">
                                            <x-common.inputLg type="password" id="password" name="password"
                                                :placeHolder="__('user.placeholder_password')" />
                                            <x-common.loginEyes />
                                        </div>
                                    </div>

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
                            </div>
                            <br />
                            <x-common.saveUpdateCancel operate="Save" url="users.index" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <x-common.loading></x-common.loading>
    </main>
    @vite('resources/js/common/loginEyes.js')
</x-master-layout>
