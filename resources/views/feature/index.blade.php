<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Table of Features
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-col gap-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
            @role('admin')
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="py-2 text-center">Name</th>
                            <th class="py-2 text-center">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($features as $feature)
                            <tr class="hover:bg-gray-100 border-b">
                                <td class="py-2 text-center">{{ $feature->name }}</td>
                                <td class="py-2 text-center">{{ $feature->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endrole

            @role('user')
            <div class="grid grid-cols-5 gap-3">
                @foreach ($features as $feature)
                <div class="flex flex-col justify-between w-full aspect-square bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                    <div class="">
                        <h4 class="text-center font-bold">{{ $feature->name }}</h4>
                        <p class="py-2 text-center text-sm">{{ $feature->description }}</p>
                    </div>
                    <form action="{{ route('features.assign', $feature) }}" class="w-full"  method="post" enctype="multipart/form-data">
                        @csrf
                        <button type="submit" class="w-full bg-blue-500 text-white rounded-sm">Tambah</button>
                    </form>
                </div>
                @endforeach
            </div>
            @endrole
        </div>
    </div>
</x-app-layout>