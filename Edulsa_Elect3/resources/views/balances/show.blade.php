<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Balances') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                <div class="flex justify-center">
                    <h1>LIST OF BALANCES</h1>
                </div>
                    <table class="table-auto border-separate border-spacing-5">
                        <thead>
                            <tr>
                                <th class="bg-blue-200 text-black font-bold py-2 px-4 rounded">Student No.</th>
                                <th class="bg-blue-200 text-black font-bold py-2 px-4 rounded">Amount Due</th>
                                <th class="bg-blue-200 text-black font-bold py-2 px-4 rounded">Total Balance</th>
                                <th class="bg-blue-200 text-black font-bold py-2 px-4 rounded">Notes</th>
                                <th class="bg-blue-200 text-black font-bold py-2 px-4 rounded">OPTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($balances as $bal)
                            <tr>
                                <td>{{ $bal->sNo }}</td>
                                <td>{{ number_format($bal->amountDue,2) }}</td>
                                <td>{{ number_format($bal->totalBalance,2) }}</td>
                                <td>{{ $bal->notes }}</td>
                                <td><a class="mt-4 bg-teal-200 hover:bg-teal-500 text-black font-bold py-2 px-4 rounded" href="{{route('balances')}}"> Back </a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>