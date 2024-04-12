<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Image Upload Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>Filename: {{ $imageUpload->filename }}</h3>
                    <!-- Assuming you have a field for image file in the image upload model -->
                    <p>Image: <img src="{{ asset('storage/' . $imageUpload->filename) }}" alt="{{ $imageUpload->filename }}" /></p>
                    <p>Mime Type: {{ $imageUpload->mime_type }}</p>
                    <p>Uploaded At: {{ $imageUpload->created_at }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
