<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            <span class="text-yellow-500">List of Image Uploads</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <a href="{{ route('imageuploads.create') }}" class="btn" style="background-color: blue; color: white;">Create New Image Upload</a>
                    <div class="table-container mt-3">
                        <table class="table border-collapse w-full">
                            <thead class="bg-blue-500 text-white">
                                <tr>
                                    <th class="px-4 py-2 w-1/3 border">Filename</th>
                                    <th class="px-4 py-2 w-1/3 border">Mime Type</th>
                                    <th class="px-4 py-2 w-1/3 border">Image</th> <!-- New column for image -->
                                    <th class="border">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($imageUploads as $imageUpload)
                                <tr class="bg-white border-b border-gray-200">
                                    <td class="px-4 py-2 border">{{ $imageUpload->filename }}</td>
                                    <td class="px-4 py-2 border">{{ $imageUpload->mime_type }}</td>
                                    <td class="px-4 py-2 border">
                                        <img src="data:image/png;base64,{{ base64_encode($imageUpload->image_data) }}" alt="{{ $imageUpload->filename }}" style="width: 90%; max-height: 200px;">
                                    </td> <!-- Render the image using base64 encoding -->
                                    <td class="border">
                                        <div class="flex gap-4 items-center">
                                            <a href="{{ route('imageuploads.edit', $imageUpload->id) }}" class="btn btn-green" style="background-color: green;">Edit</a>
                                            <form action="{{ route('imageuploads.destroy', $imageUpload->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-red" style="background-color: red;">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
