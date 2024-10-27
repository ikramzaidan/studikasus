<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-col gap-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col gap-3">
                <h2 class="font-bold">User Lists</h2>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex flex-col text-gray-900 dark:text-gray-100 p-6">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-100 border-b">
                                    <th class="py-2 text-center">Name</th>
                                    <th class="py-2 text-center">Email</th>
                                    <th class="py-2 text-center">Most Used Feature</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="hover:bg-gray-100 border-b">
                                        <td class="py-2 text-center">{{ $user->name }}</td>
                                        <td class="py-2 text-center">{{ $user->email }}</td>
                                        <td class="py-2 text-center">{{ $user->mostUsedFeature() ?? "-" }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-3">
                <h2 class="font-bold">Popular Features</h2>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex flex-col text-gray-900 dark:text-gray-100 p-6">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-100 border-b">
                                    <th class="py-2 text-center">Name</th>
                                    <th class="py-2 text-center">Usage Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($features as $feature)
                                    <tr class="hover:bg-gray-100 border-b">
                                        <td class="py-2 text-center">{{ $feature->name }}</td>
                                        <td class="py-2 text-center">{{ $feature->users_count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-3">
                <h2 class="font-bold">Payment Status</h2>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex flex-col text-gray-900 dark:text-gray-100 p-6">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-100 border-b">
                                    <th class="py-2 text-center">User</th>
                                    <th class="py-2 text-center">Feature</th>
                                    <th class="py-2 text-center">Payment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userFeatures as $userFeature)
                                    <tr class="hover:bg-gray-100 border-b">
                                        <td class="py-2 text-center">{{ $userFeature->user->name }}</td>
                                        <td class="py-2 text-center">{{ $userFeature->feature->name }}</td>
                                        <td class="py-2 text-center">{{ $userFeature->payment_status }}</td>
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
