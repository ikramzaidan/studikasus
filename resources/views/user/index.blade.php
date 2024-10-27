<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Table of Users
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="py-2 text-center">Name</th>
                            <th class="py-2 text-center">Email</th>
                            <th class="py-2 text-center">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-100 border-b">
                                <td class="py-2 text-center">{{ $user->name }}</td>
                                <td class="py-2 text-center">{{ $user->email }}</td>
                                <td class="py-2 text-center">
                                    {{ $user->payments ?? 'Belum Ada Pembayaran' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>