<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Enrolled Subjects Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <h6>Errors Encountered</h6>
                    @if($errors)
                       <ul>
                          @foreach($errors->all() as $error)
                         <li>{{$error}}</li>
                    @endforeach
                         </ul>
                    @endif
                <form method = "POST" action="{{ route('enrolledsubjects-store') }}">
                                                        @csrf
                    <div class="flex-items-center">
                            <label for="Subject Code">Subject Code</label>
                        <div>
                            <input type="text" name="xsubjectCode" value="{{old('xsubjectCode')}}"/>
                        </div>
                    </div>
                    <div class="flex-items-center">
                            <label for="Description">Description</label>
                        <div>
                            <input type="text" name="xdescription" value="{{old('xdescription')}}"/>
                        </div>
                    </div>
                    <div class="flex-items-center">
                            <label for="Units">Units</label>
                        <div>
                            <input type="text" name="xunits" value="{{old('xunits')}}"/>
                        </div>
                    </div>
                    <div class="flex-items-center">
                            <label for="Schedule">Schedule</label>
                        <div>               
                            <input type="text" name="xschedule" value="{{old('xschedule')}}"/>
                        </div>
                    </div>
                    <button class="mt-4 bg-teal-200 hover:bg-teal-500 text-black font-bold py-2 px-4 rounded" type ="submit"> Submit Info </button>
                    <a class="mt-4 bg-teal-200 hover:bg-teal-500 text-black font-bold py-2 px-4 rounded" href="{{route('enrolledsubjects')}}"> Back </a>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>