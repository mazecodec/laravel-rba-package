<x-client-layout>
    <x-slot name="header">
        <span class="mx-6 mt-6 font-light text-xl">Bienvenido {{ auth()->user()->name }}</span>
    </x-slot>

    <x-content-app-layout>
        <h2 class="text-xl font-black">User Documents</h2>
        <div class="flex">
            <div
                class="w-1/3 h-full mr-6 border-r-2 border-gray-200 border-opacity-40">
                <ul class="mx-2">
                    @foreach($documents as $document)
                        <li class="flex flex-wrap justify-between items-center">{{ $document->name }} <x-ri-check-line /></li>
                    @endforeach
                </ul>
            </div>
            <div class="flex-1 flex-grow h-full">
                <form action="{{ route('documents.store') }}" method="POST">
                    <input type="file" multiple>
                    <button type="submit">Upload</button>
                </form>
            </div>
    </x-content-app-layout>
</x-client-layout>
