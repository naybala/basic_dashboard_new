<x-master-layout name="User" headerName="{{ __('sidebar.user') }}">
    <main class="h-full overflow-y-auto">
        <div class="hidden" id="loadingFalse">
            <div class="container px-1 md:px-6 mx-auto grid">
                <div class="container flex flex-wrap justify-between mx-auto mt-5">
                    {{-- Search --}}
                    <x-common.search :keyword="$keyword" />
                    {{-- Search --}}
                    <x-common.createButton route="users.create" />

                </div>
                <br>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4 mr-4 bg-green-400">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 mr-10 text-center">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['data'] as $user)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 items-center ">
                                    <td scope="row" class="px-6 py-4">
                                        {{ Str::limit($user['name'], 20) }}
                                    </td>
                                    <td scope="row" class="px-6 py-4">
                                        {{ Str::limit($user['email'], 20) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <x-common.Status :status="$user['status']" />
                                    </td>
                                    <x-common.editAndDeleteButton deleteRoute="users.destroy" :deleteId="$user['id']"
                                        editRoute="users.edit" />
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <x-common.pagination :links="$data['meta']['links']" :keyword="$keyword"></x-common.pagination>
            </div>
        </div>
        <x-common.loading></x-common.loading>
    </main>
    {{-- @vite('resources/js/common/deleteConfirm.js') --}}
</x-master-layout>
