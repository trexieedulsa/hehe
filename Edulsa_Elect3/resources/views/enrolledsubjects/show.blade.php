<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Students Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">

                    <h6>Enrolled Subjects</h6><br />
                    <table class="table-auto border border-gray-800">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border border-gray-800">Subject Code</th>
                                <th class="px-4 py-2 border border-gray-800">Description</th>
                                <th class="px-4 py-2 border border-gray-800">Units</th>
                                <th class="px-4 py-2 border border-gray-800">Schedule</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($enrolledsubjects as $ensubjects)
                            <tr>
                                <td class="px-4 py-2 border border-gray-800">{{$ensubjects->subjectCode}}</td>
                                <td class="px-4 py-2 border border-gray-800">{{$ensubjects->description }}</td>
                                <td class="px-4 py-2 border border-gray-800">{{$ensubjects->units }}</td>
                                <td class="px-4 py-2 border border-gray-800">{{$ensubjects->schedule }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <a class="mt-4 float-left bg-blue-200 text-black font-bold py-2 px-4 rounded" href="{{route('enrolledsubjects')}}"> Back </a>
                    <br /><br /><br />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>