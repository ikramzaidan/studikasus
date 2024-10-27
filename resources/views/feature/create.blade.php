<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Table of Features
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-2 w-full">
                    <form action="{{ route('features.store') }}" class="flex flex-col"  method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <div>Feature Name</div>
                            <input name="name" class="w-full">
                        </div>
                        <div class="mb-4">
                            <div>Feature Description</div>
                            <input name="description" class="w-full">
                        </div>
                        <button class="p-2 border">Create</button> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>