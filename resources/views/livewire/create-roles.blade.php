<div class="bg-white dark:bg-gray-800 p-5 ">
    <div class="w-full mx-auto">
      <h2 class="dark:text-white text-3xl font-bold pb-5 text-center"> {{$modelData['id']?'Update ':'New '}} Role</h2>
      <div class="mb-5 flex flex-col sm:flex-row gap-5">
        <div class="flex flex-col gap-5 w-full ">
            <div class="w-full md:w-1/2 mx-auto dark:text-gray-400">
              <label for="success"
                class="block mb-2 text-sm font-medium">Role Name</label>
              <input type="text"
                id="success"
                class=" border text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 "
                wire:model="modelData.name"
                placeholder="Role name"
                required
                placeholder="">
                @error('modelData.name') <span class="text-red-800 dark:text-red-400">This Field is required</span> @enderror
            </div>
        </div>

      </div>


      <div class="w-full flex justify-end">
        <button wire:click="{{$modelData['id']?'update':'create'}}"
          class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          {{$modelData['id']?'Update':'Create'}}
        </button>
      </div>
    </div>

  </div>
