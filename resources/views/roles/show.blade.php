<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ ucfirst($role->name) }} Role
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
                                        <th class="px-4 py-2">Name</th>
                                        <th class="px-4 py-2">Guard</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rolePermissions as $permission)
                                        <tr>
                                            <td class="px-4-py-2">{{ $permission->name }}</td>
                                            <td class="px-4-py-2">{{ $permission->guard_name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>