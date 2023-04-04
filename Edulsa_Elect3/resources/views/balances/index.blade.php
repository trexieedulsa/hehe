<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Balances') }}
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center items-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-center">
                        <a href="{{ route('add-balances')}}" class="mt-4 bg-teal-200 text-black font-bold py-2 px-4 rounded">Add Student Balances</a>
                    </div>
                    <br><br>
                    <div class="flex justify-center">
                        <h1>LIST OF BALANCES</h1>
                    </div>
                    <br><br>
                        <table class="table-auto border-separate border-spacing-5">
                            <thead>
                                <tr>
                                    <th class="bg-blue-200 text-black font-bold py-2 px-4 rounded">ID No.</th>
                                    <th class="bg-blue-200 text-black font-bold py-2 px-4 rounded">Student Name</th>
                                    <th class="bg-blue-200 text-black font-bold py-2 px-4 rounded">Amount Due</th>
                                    <th class="bg-blue-200 text-black font-bold py-2 px-4 rounded">Total Balance</th>
                                    <th class="bg-blue-200 text-black font-bold py-2 px-4 rounded">Notes</th>
                                    <th></th>
                                    <th class="bg-blue-200 text-black font-bold py-2 px-4 rounded">OPTIONS</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($balances as $bal)
                                <tr>
                                    <td>{{$bal->idNo}}</td>
                                    <td>{{$bal->lastName}}, {{$bal->firstName}} {{$bal->middleName}} {{$bal->suffix}}</td>
                                    <td>{{number_format($bal->amountDue,2)}}</td>
                                    <td>{{number_format($bal->totalBalance,2)}}</td>
                                    <td>{{$bal->notes}}</td>
                                    <td>
                                        <a href="{{route('balances-show', ['balancesNo' => $bal->bNo] )}}" class="mt-4 bg-teal-200 text-black font-bold py-2 px-4 rounded">View</a>
                                    </td>
                                    <td>
                                        <a href="{{route('balances-edit', ['balancesNo' => $bal->bNo])}}" class="mt-4 bg-teal-200 text-black font-bold py-2 px-4 rounded">Edit</a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{route('balances-delete', ['balancesNo' => $bal->bNo])}}" onclick="return confirm('Are you sure you want to delete this record?')">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="mt-4 bg-teal-200 text-black font-bold py-2 px-4 rounded">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>  
            </div>
        </div>
    </div>
</x-app-layout>