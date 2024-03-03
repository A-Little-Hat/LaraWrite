<x-app-layout>
    <x-slot name="header">
        @auth
        <div class="flex justify-between" style="" >
            <a class="text-xl text-white" href="{{ url('/')}}/post/all">View All Post</a>
            <a class="text-xl text-white" href="{{ url('/')}}/post/username/{{auth()->user()->name}}">View My Post</a>
            <a class="text-xl text-white" href="{{ url('/')}}/post/all/username">View all user</a>
        </div>
        @endauth
    </x-slot>

</x-app-layout>