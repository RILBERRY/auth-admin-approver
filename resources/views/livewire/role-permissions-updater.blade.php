<div class="bg-white dark:bg-gray-800 flex flex-col gap-4 p-5 ">
    <h2 class="dark:text-white text-3xl font-bold pb-5 text-center"> Update Permissions For the Role {{ $this->role->name}}</h2>

    <div class="w-2/4 mx-auto mb-5">
        <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" wire:model.live="searchParams"  class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required />
        </div>
    </div>

    <div class="w-full flex mx-auto mt-5 h-[50vh]">
      <div class="w-full flex justify-center flex-wrap gap-5 overflow-scroll scrollbar-hide ">
        <h2 class="dark:text-gray-400 w-full text-md font-bold text-center">All permissions </h2>

        @foreach ($filteredPermission as $permission)
        <button
            type="button"
            @if (count($permission->roles))
                wire:click="removePermission({{$permission->id}})"
                class="inline-flex items-center h-fit px-5 w-[30%] py-2.5 text-sm font-medium text-center text-white bg-orange-400 rounded-lg hover:bg-orange-500  dark:bg-orange-700 dark:hover:bg-blue-700"
            @else
                wire:click="assignPermission({{$permission->id}})"
                class="inline-flex items-center h-fit px-5 w-[30%] py-2.5 text-sm font-medium text-center text-gray-600 dark:text-gray-200 hover:text-gray-200 bg-gray-200 rounded-lg hover:bg-orange-500  dark:bg-gray-700 dark:hover:bg-blue-700"

            @endif

            >
            {{ str_replace(['-', '.'], ' ', $permission->name )  }}
        </button>


        @endforeach
      </div>

    </div>

  </div>
