<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Balances') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h6>Errors Encountered:</h6>
                    @if($errors)
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif
                    <br><br>
                    <form method="POST" action="{{ route('balances-store') }}">
                        @csrf
                        <div class="flex-items-center text-xl">
                            <label for="Student Balance" class="font-semibold text-l">Student Balance</label>
                        </div><br>
                        <div class="flex-items-center">
                                <label for="Student Select" class="font-bold">Select Student</label>
                                <select name="xsNo" class="border border-gray-300 px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
                                    @foreach ($studentinfos as $stuinfo)
                                <option value="{{$stuinfo->sNo}}">{{$stuinfo->idNo}} - {{$stuinfo->lastName}}, {{$stuinfo->firstName}} {{$stuinfo->middleName}} {{$stuinfo->suffix}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="flex-items-center">
                            <label for="amountDue">Amount Due</label>
                            <div>
                                <input type="text" name="xamountDue" value="{{old('xamountDue')}}" />
                            </div>
                        </div>
                        <div class="flex-items-center">
                            <label for="totalBalance">Total Balance</label>
                            <div>
                                <input type="text" name="xtotalBalance" value="{{old('xtotalBalance')}}" />
                            </div>
                        </div>
                        <div class="flex-items-center">
                            <label for="notes">Notes</label>
                            <div>
                                <input type="text" name="xnotes" value="{{old('xnotes')}}" />
                            </div>
                        </div><br>
                        <button type="submit" class="mt-4 bg-teal-200 hover:bg-teal-500 text-black font-bold py-2 px-4 rounded">Add</button>

                        <a class="mt-4 bg-teal-200 hover:bg-teal-500 text-black font-bold py-2 px-4 rounded" href="{{route('balances')}}"> Back </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>