<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Balance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if($errors)
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    @foreach($balances as $bal)
                    <form method="POST" action="{{ route('balances-update',['BalanceNo' => $bal->bNo]) }}">
                        @csrf
                        @method('patch')
                        <div class="flex-items-center"><label for="ID xamountDue">Amount Due</label>
                            <div>
                                <input type="text" name="xamountDue" value="{{ $bal->amountDue }}"/>
                            </div>
                        </div>
                        <div class="flex-items-center"><label for="xtotalBalance">Total Balance</label>
                            <div>
                                <input type="text" name="xtotalBalance" value="{{ $bal->totalBalance }}"/>
                            </div>
                        </div>
                        <div class="flex-items-center"><label for="xnotes">Notes</label>
                            <div>
                                <input type="text" name="xnotes" value="{{ $bal->notes }}"/>
                            </div>
                        </div>                                            
                        <div>
                            <button type="submit" class="mt-4 bg-teal-200 hover:bg-teal-500 text-black font-bold py-2 px-4 rounded" > Submit</button>
                            <a  class="mt-4 bg-teal-200 hover:bg-teal-500 text-black font-bold py-2 px-4 rounded" href="{{route('balances')}}">Back </a>
                        </div>


                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>