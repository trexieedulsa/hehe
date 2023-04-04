<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Enrolled Subjects') }}
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center items-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-center">
                        <a href="{{ route('add-enrolledsubjects')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Add Enrolled Subject</a>
                    </div>
                    <h6 class="mt-4 text-2xl font-bold">Enrolled Subjects</h6><br>
                    <div class="overflow-x-auto">
                        <table class="table-auto border-collapse">
                            <thead>
                                <tr>
                                    <th class="border border-gray-500 px-4 py-2">Subject Code</th>
                                    <th class="border border-gray-500 px-4 py-2">Description</th>
                                    <th class="border border-gray-500 px-4 py-2">Units</th>
                                    <th class="border border-gray-500 px-4 py-2">Schedule</th>
                                    <th class="border border-gray-500 px-4 py-2">View</th>
                                    <th class="border border-gray-500 px-4 py-2">Edit</th>
                                    <th class="border border-gray-500 px-4 py-2">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($enrolledsubjects as $ensubjects)
                                <tr>
                                    <td class="border border-gray-500 px-4 py-2">{{$ensubjects->subjectCode}}</td>
                                    <td class="border border-gray-500 px-4 py-2">{{$ensubjects->description}}</td>
                                    <td class="border border-gray-500 px-4 py-2">{{$ensubjects->units}}</td>
                                    <td class="border border-gray-500 px-4 py-2">{{$ensubjects->schedule}}</td>
                                    <td class="border border-gray-500 px-4 py-2">
                                        <a href="{{route('enrolledsubjects-show', ['esNo' => $ensubjects->esNo])}}" class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded mr-2">View</a>


                                    </td>
                                    <td class="border border-gray-500 px-4 py-2">
                                        <a href="{{route('enrolledsubjects-edit', ['esNo' => $ensubjects->esNo])}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                                    </td>
                                    <td class="border border-gray-500 px-4 py-2">
                                        <form method="POST" action="{{route('enrolledsubjects-delete', ['esNo' => $ensubjects->esNo])}}" onclick="return confirm('Are you sure you want to delete this record?')">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
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