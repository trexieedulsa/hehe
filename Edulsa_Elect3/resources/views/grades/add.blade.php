<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Grades Information') }}
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
                    <form method="POST" action="{{ route('grades-store') }}">
                        @csrf
                        <div class="flex-items-center text-xl">
                            <label for="Student Balance" class="font-semibold text-l">Student Grades</label>
                        </div><br>
                        <div class="flex-items-center">
                                <label for="Student Select" class="font-bold">Select Subjects</label>
                                <select name="xesNo" class="border border-gray-300 px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
                                    @foreach ($enrolledsubjects as $Subjects)
                                <option value="{{$Subjects->esNo}}">{{$Subjects->subjectCode}} - {{$Subjects->description}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="flex-items-center">
                                <label for="Student Select" class="font-bold">Select Student</label>
                                <select name="xsno" class="border border-gray-300 px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
                                    @foreach ($test as $stuinfo)
                                <option value="{{$stuinfo->sNo}}">{{$stuinfo->idNo}} - {{$stuinfo->lastName}}, {{$stuinfo->firstName}} {{$stuinfo->middleName}} {{$stuinfo->suffix}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="flex-items-center">
                            <label for="Prelim">Prelim</label>
                            <div>
                                <input type="number" precision="3" scale="2" name="xprelim" value="{{old('xprelim')}}"/>
                            </div>
                        </div>
                        <div class="flex-items-center">
                            <label for="Midterm">Midterm</label>
                            <div>
                                <input type="number" precision="3" scale="2" name="xmidterm" value="{{old('xmidterm')}}"/>
                            </div>
                        </div>
                        <div class="flex-items-center">
                            <label for="Final">Final</label>
                            <div>
                                <input type="number" precision="3" scale="2" name="xfinal" value="{{old('xfinal')}}"/>
                            </div>
                        </div>
                        <div class="flex-items-center">
                            <label for="Remarks">Remarks</label>
                            <div>
                                <input type="text" name="xremarks" value="{{old('xremarks')}}"/>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="mt-4 bg-teal-200 hover:bg-teal-500 text-black font-bold py-2 px-4 rounded">Add</button>

                        <a class="mt-4 bg-teal-200 hover:bg-teal-500 text-black font-bold py-2 px-4 rounded" href="{{route('grades')}}"> Back </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>