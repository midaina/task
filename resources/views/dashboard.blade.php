<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{--            {{ __('Dashboard') }}--}}
            Welcome  {{ Auth::user()->name }}
        </h2>

        @if(Auth::user()->status=='1')
            <p >
            You are log in as a Teacher
            </p>
        @else
            <p >
                You are log in as a Student
            </p>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <!-- <x-jet-welcome /> -->
                <div class="container">
                @yield('content')
                    <br>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
