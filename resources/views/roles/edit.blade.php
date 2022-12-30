<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Update Role') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg dark:bg-dark-eval-1">
                <div class="p-6 bg-white border-d border-gray-100 dark:bg-dark-eval-1">
                    <form action="{{ route('roles.update', $role->id) }}" method="post">
                        @method('patch')
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-100">Name</label>
                            <input type="text" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Name" name="name" value="{{ $role->name }}">
                        </div>
                        <div class="mb-4">
                            <label for="permission" class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-100">Assign Permissions</label>
                            <table class="table-fixed w-full">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2"><input type="checkbox" name="all_permission"></th>
                                        <th class="px-4 py-2">Name</th>
                                        <th class="px-4 py-2">Guard</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($permissions as $permission)
                                        <tr>
                                            <th class="px-4 py-2">
                                                <input type="checkbox" 
                                                name="permission[{{ $permission->name }}]"
                                                value="{{ $permission->name }}"
                                                class='permission'
                                                {{ in_array($permission->name, $rolePermissions) 
                                                    ? 'checked'
                                                    : '' }}>
                                            </th>
                                            <td class="px-4-py-2">{{ $permission->name }}</td>
                                            <td class="px-4-py-2">{{ $permission->guard_name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-sky-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-sky-800 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                    Update
                                </button>
                            </span>
                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                <a href="{{ route('roles.index') }}" class="inline-flex justify-center w-full rounded-md border border-red-300 hover:border-red-500 px-4 py-2 bg-white dark:bg-dark-eval-2 text-base leading-6 font-bold text-red-500 shadow-sm hover:text-red-800 focus:outline-none focus:border-red-500 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                    Cancel
                                </a>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    window.addEventListener('load', function() {
        $('[name="all_permission"]').on('click', function() {

            if($(this).is(':checked')) {
                $.each($('.permission'), function() {
                    $(this).prop('checked',true);
                });
            } else {
                $.each($('.permission'), function() {
                    $(this).prop('checked',false);
                });
            }
        });
    });

    function allChecked() {

    }
</script>