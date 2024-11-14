<div class="bg-white dark:bg-gray-800 flex flex-col gap-4 p-5 ">
    <h2 class="dark:text-white text-3xl font-bold pb-5 text-center"> Assign Role {{ $this->role->name}}</h2>

    <div class="w-2/4 mx-auto mb-5">
        <label for="search"
            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search"
                wire:model.live="searchParams"
                class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search"
                required />
        </div>
    </div>

    <div class="w-full flex mx-auto mt-5 h-[50vh]">
        <div class="w-full flex flex-col gap-5 overflow-scroll scrollbar-hide ">
            <h2 class="dark:text-gray-400 w-full text-md font-bold text-center">All Users </h2>
            <div class="flex flex-col w-full">
                @foreach ($filteredUsers as $filteredUser)
                <div
                    class="flex justify-between items-center h-fit px-5 w-full py-2.5 text-sm font-medium text-center dark:text-white bg-gray-100 rounded-lg  dark:bg-gray-700 ">
                    <span class="w-1/2 text-left">
                        {{ str_replace(['-', '.'], ' ', $filteredUser->name ) }}
                        <div>
                            @foreach ($filteredUser->roles as $userRole)
                            <span class="bg-green-400 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-700 dark:text-green-100">
                                {{$userRole->name}}
                            </span>
                            @endforeach
                        </div>

                    </span>
                    <span class="flex gap-5">
                        @if ($filteredUser->hasRole($role))
                        <button type="button"
                            wire:click="removeRole({{$filteredUser->id}})"
                            class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800  dark:bg-red-600 dark:hover:bg-red-700 ">
                            Revoke Role
                        </button>

                        @else
                        <button type="button"
                            wire:click="assignRoleToUser({{$filteredUser->id}})"
                            class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800  dark:bg-green-600 dark:hover:bg-green-700 ">
                            Assign Role
                        </button>

                        @endif
                    </span>
                </div>


                @endforeach

            </div>
        </div>

    </div>

</div>
