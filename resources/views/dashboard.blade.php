<x-app-layout>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
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
                            <p class="text-white text-xxl" >
                                All Users
                            </p>
                            @foreach($allUser as $p)
                                <p>
                                &#8226
                                    <a href="{{ url('/')}}/post/username/{{$p->name}}">
                                        {{$p->name}}
                                    </a>
                                </p>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
