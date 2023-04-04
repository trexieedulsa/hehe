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
                    
                    <br><br>
                    <div class="flex justify-center">
                        <h1>GRADE LISTS</h1>
                    </div>
                    <br><br>
                    
                    <table class = "table-auto border-separate border-spacing-5">
                        <thead>
                            <tr>
                                <th class="bg-blue-200 text-black font-bold py-2 px-4 rounded">Enrolled Subjects Number</th>
                                <th class="bg-blue-200 text-black font-bold py-2 px-4 rounded">Student Number</th>
                                <th class="bg-blue-200 text-black font-bold py-2 px-4 rounded">Prelim</th>
                                <th class="bg-blue-200 text-black font-bold py-2 px-4 rounded">Midterm</th>
                                <th class="bg-blue-200 text-black font-bold py-2 px-4 rounded">Final</th>
                                <th class="bg-blue-200 text-black font-bold py-2 px-4 rounded">Remarks</th>                        
                                <th class="bg-blue-200 text-black font-bold py-2 px-4 rounded">Options</th>                           
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grades as $gradess)
                                <tr>
                                    <td>{{$gradess->esNo }}</td>
                                    <td>{{$gradess->sNo }} </td>
                                    <td>{{$gradess->prelim }}</td>
                                    <td>{{$gradess->midterm }}</td>
                                    <td>{{$gradess->final }}</td>
                                    <td>{{$gradess->remarks}}</td>    
                                    <td><a class="mt-4 bg-teal-200 hover:bg-teal-500 text-black font-bold py-2 px-4 rounded" href="{{route('grades')}}"> Back </a></td>                                                                                                      
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>