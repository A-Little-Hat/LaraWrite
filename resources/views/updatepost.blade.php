<x-app-layout>
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm">
<div class="p-6 text-gray-900 dark:text-gray-100">
<h4>Update Post</h4>
<form action="{{ url('/')}}/post/update/{{$postid}}" method="post">
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
                <button type="submit">Update Post</button>
            </div>
        </div>
</form>
</div>
</div>
</x-app-layout>