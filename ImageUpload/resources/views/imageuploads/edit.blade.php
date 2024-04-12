

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Image Upload
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('imageuploads.update', $imageUpload->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <label for="filename" class="block font-medium text-sm text-white" >Filename</label>
                                <input id="filename" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="filename" value="{{ $imageUpload->filename }}" required autofocus />
                            </div>

                            <div class="col-span-6">
                                <label for="mime_type" class="block font-medium text-sm text-white">Mime Type</label>
                                <input id="mime_type" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="mime_type" value="{{ $imageUpload->mime_type }}" required />
                            </div>

                            <div class="col-span-6">
                                <label for="image" class="block font-medium text-sm text-white">Current Image</label>
                                <img src="data:image/jpeg;base64,{{ base64_encode($imageUpload->image_data) }}" alt="Current Image" class="mt-1 mb-4" style="max-width: 100%; height: 300px;">
                                <input id="image" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="file" name="image" />
                            </div>

                            <div class="col-span-6 flex justify-end">
                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 disabled:opacity-25 transition">{{ __('Update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
