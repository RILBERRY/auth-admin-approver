@extends(config('admin-approver.views.roles.layout'))
@section('title', 'Role Management')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
        <div class="flex flex-col md:flex-row items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Roles</h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Manage Roles details</p>
            </div>
            <button
                type="button"
                onclick="Livewire.dispatch('openModal', {
                    component: 'create-roles',
                    arguments: {
                        id: null,
                        redirectToRouteName: 'roles-view',
                    }
                })"
                class="mt-4 md:mt-0 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition"
            >
                Add New Role
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Role Name</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Guard Name</th>
                        <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-500 text-right dark:text-gray-300 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @forelse ($roles as $role)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 dark:text-gray-300">{{ $role->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="text-sm text-gray-900 dark:text-gray-300">{{ $role->guard_name }}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm flex gap-2 justify-end font-medium">
                                <button
                                    type="button"
                                    onclick="Livewire.dispatch('openModal', {
                                        component: 'assign-role-to-user',
                                        arguments: {
                                            role_id: {{$role->id}},
                                            redirectToRouteName: 'roles-view',
                                        }
                                    })"
                                   class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-green-400 rounded-lg hover:bg-green-500  dark:bg-green-600 dark:hover:bg-green-700 ">
                                    Assign to user
                                </button>
                                <button
                                    type="button"
                                    onclick="Livewire.dispatch('openModal', {
                                        component: 'role-permissions-updater',
                                        arguments: {
                                            role_id: {{$role->id}},
                                            redirectToRouteName: 'roles-view',
                                        }
                                    })"
                                   class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-orange-400 rounded-lg hover:bg-orange-500  dark:bg-orange-600 dark:hover:bg-orange-700 ">
                                    Update Permission
                                </button>
                                <button
                                    type="button"
                                    onclick="Livewire.dispatch('openModal', {
                                        component: 'create-roles',
                                        arguments: {
                                            id: {{$role->id}},
                                            redirectToRouteName: 'roles-view',
                                        }
                                    })"
                                   class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800  dark:bg-blue-600 dark:hover:bg-blue-700 ">
                                    Edit
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 text-center">
                                No Roles found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
            {{ $roles->links('components.paginator') }}
        </div>
    </div>
</div>
@endsection
