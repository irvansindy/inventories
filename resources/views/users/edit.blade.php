<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Update User') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg dark:bg-dark-eval-1">
                <div class="p-6 bg-white border-d border-gray-100 dark:bg-dark-eval-1">
                    <form action="{{ route('users.update', $user->id) }}" method="post">
                        @method('patch')
                        @csrf
                        <div>
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-100">Name</label>
                                <input type="text" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Name" name="name" value="{{ $user->name }}">
                            </div>
                            <div class="mb-4">
                                <label for="username" class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-100">Username</label>
                                <input type="text" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Username" name="username" value="{{ $user->username }}">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-100">Email Address</label>
                                <input type="email" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Email Address" name="email" value="{{ $user->email }}">
                            </div>
                            <div class="mb-4">
                                <label for="role" class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-100">Role</label>
                                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="role" id="role">
                                    {{-- <option value="hidden">Select Role</option> --}}
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ in_array($role->name, $userRole) 
                                        ? 'selected'
                                        : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <button type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-sky-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-sky-800 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Update
                                    </button>
                                </span>
                                <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                    <a href="{{ route('users.index') }}" class="inline-flex justify-center w-full rounded-md border border-red-300 hover:border-red-500 px-4 py-2 bg-white dark:bg-dark-eval-2 text-base leading-6 font-bold text-red-500 shadow-sm hover:text-red-800 focus:outline-none focus:border-red-500 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Cancel
                                    </a>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>