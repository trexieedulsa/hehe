<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Enrolled Subjects') }}
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
                    @foreach($enrolledsubjects as $ensubjects)
                    <form method="POST" action="{{ route('enrolledsubjects-update',['esNo' => $ensubjects->esNo]) }}">
                        @csrf
                        @method('patch')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="Subject Code" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Subject Code</label>
                                <input type="text" name="xsubjectCode" value="{{ $ensubjects->subjectCode }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-600">
                            </div>
                            <div>
                                <label for="Description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Description</label>
                                <input type="text" name="xdescription" value="{{ $ensubjects->description }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-600">
                            </div>
                            <div>
                                <label for="Units" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Units</label>
                                <input type="text" name="xunits" value="{{ $ensubjects->units }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-600">
                            </div>
                            <div>
                                <label for="Schedule" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Schedule</label>
                                <input type="text" name="xschedule" value="{{ $ensubjects->schedule }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-600">
                            </div>
                        </div>
                        <div class="flex justify-start mt-4">
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-500"> Submit</button>

                        </div>
                        <div class="flex justify-end mt-4">
                            <a class="mt-4 float-left bg-blue-200 text-black font-bold py-2 px-4 rounded" href="{{route('enrolledsubjects')}}"> Back </a>

                        </div>


                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
