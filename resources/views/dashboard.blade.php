<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <a href="{{ url('/')}}/post/all">View All Post</a>
        <a href="{{ url('/')}}/post/username/{{$user->name}}">View My Post</a>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <!-- <div>
                            {{$user->id}}
                        </div> -->
                    <!-- {{ __("You're logged in!") }} -->
                    <!-- {{ __("Welcome,") }} {{ $user->name }}  -->
                    <!-- <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="project-name">project_name</label>
                        <input type="text" name="project_name" />
                        <input type="file" name="files[]" multiple>
                        <button type="submit">Upload</button>
                    </form> -->
                    <!-- <a href="/post/1">1</a>
                    <a href="/post/2">2</a> -->
                    <div class="flex" >
                        <div class="flex-col w-1/2">
                            <h4>Add Post</h4>
                            <form action="/post/addpost" method="get">
                            @csrf <!-- CSRF Protection -->
        
                                    <div class="h-screen">
                                        <div class="m-10">
                                            <label for="title">title</label><br>
                                            <input class="text-black" type="text" name="title" id="title"/>
                                        </div>
                                        <div class="m-10">
                                            <label for="content">content</label> <br>
                                            <textarea class="text-black" type="textarea" name="content" id="content"></textarea>
                                        </div>
                                        <div class="m-10">
                                            <button type="submit">Add Post</button>
                                        </div>
                                    </div>
        
                            </form>
                        </div>
                        <div class="flex-col w-1/2">
                            <h4>My Space</h4>
                            <div class="flex-col" >
                                <a href="{{ url('/')}}/post/all">View All Post</a>
                                <a href="{{ url('/')}}/post/username/{{$user->name}}">View My Post</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
