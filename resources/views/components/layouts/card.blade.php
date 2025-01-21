<div class="flex items-center justify-center min-h-screen dark:bg-gray-900">
    <div class="w-96 rounded-lg bg-black p-6 shadow-md dark:bg-gray-800 dark:text-white">
        <h5 class="mb-4 text-xl font-semibold text-center text-white">{{ $todo->title }}</h5>
        <p class="mb-6 text-base text-center text-gray-300">{{ $todo->description }}</p>
       @php
       use Illuminate\Support\Facades\Storage;
       @endphp
        
        @if ($todo->FileName)
        <img src="{{ Storage::url('uploads/'.$todo->FileName) }}" alt="Todo Image" class="mb-4">
        
        @endif
        <div class="flex justify-center space-x-4">
            <button id="openEditModal{{ $todo->id }}"
                class="rounded bg-blue-500 px-6 py-2 text-sm font-medium uppercase text-white shadow-md transition duration-150 ease-in-out hover:bg-blue-600 focus:bg-blue-700 active:bg-blue-800">
                Edit
            </button>

            <button id="openDeleteModal{{ $todo->id }}"
                class="rounded bg-red-500 px-6 py-2 text-sm font-medium uppercase text-white shadow-md transition duration-150 ease-in-out hover:bg-red-600 focus:bg-red-700 active:bg-red-800">
                Delete
            </button>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal{{ $todo->id }}" class="fixed inset-0 hidden bg-black bg-opacity-50 z-50">
    <div class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-gray-800 dark:bg-gray-800 rounded-lg p-6 w-80 shadow-md">
        <h2 class="text-lg font-semibold text-center text-white">Edit Todo</h2>
        <form action="{{ route('todo.edit', $todo) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" name="title" value="{{ $todo->title }}"
                class="w-full mt-3 p-2 border rounded dark:bg-gray-700 dark:text-white" placeholder="Title">
            <textarea name="description" class="w-full mt-3 p-2 border rounded dark:bg-gray-700 dark:text-white"
                placeholder="Description">{{ $todo->description }}</textarea>
             @if ($todo->FileName)
             <img src="{{ Storage::url('uploads/'.$todo->FileName) }}" alt="Todo Image" class="mb-4">
             
             @endif
                          <input type="file" name="file" class="w-full mt-3 p-2 border rounded dark:bg-gray-700 dark:text-white" value="{{$todo->FileName}}">


            <div class="flex justify-between mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Save
                </button>
                <button type="button" id="closeEditModal{{ $todo->id }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Close
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteModal{{ $todo->id }}" class="fixed inset-0 hidden bg-black bg-opacity-50 z-50">
    <div class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-gray-800 dark:bg-gray-800 rounded-lg p-6 w-80 shadow-md">
        <h2 class="text-lg font-semibold text-center text-red-600">Confirm Delete</h2>
        <p class="text-center text-white mt-3">Are you sure you want to delete this todo?</p>

        <div class="flex justify-between mt-4">
            <form action="{{ route('todo.delete', $todo) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                    Delete
                </button>
            </form>
            <button type="button" id="closeDeleteModal{{ $todo->id }}"
                class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Cancel
            </button>
        </div>
    </div>
</div>
