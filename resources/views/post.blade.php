<x-app-layout>
<div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
@foreach ($posts as $post)
<article class=" p-10 m-10 h-max px-10 flex max-w-xl flex-col items-start justify-between bg-gray-500 rounded-md bg-clip-padding backdrop-filter backdrop-blur-2xl bg-opacity-70 border border-gray-100
">
        <div class="group relative">
          <h3 class="mt-3 text-lg font-semibold leading-6 text-white group-hover:text-white">
            <a href="#">
              <span class="absolute inset-0"></span>
              {{ $post->title }}
            </a>
          </h3>
          <p class="mt-5 line-clamp-3 text-sm leading-6 text-white">{{ $post->content }}</p>
        </div>
        <div class="relative mt-8 flex items-center gap-x-4">
          <img src="https://api.dicebear.com/7.x/fun-emoji/svg?seed={{$post->author}}" alt="" class="h-10 w-10 rounded-full bg-gray-50">
          <div class="text-sm leading-6">
            <p class="font-semibold text-white">
              <a href="#">
                <span class="absolute inset-0"></span>
                {{ $post->author }}
              </a>
            </p>
          </div>
        </div>
        @if($display)
        <div class="mt-10" >
            <a href="{{ url('/')}}/post/update/{{$post->id}}">
                <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    update
                </button>
            </a>
            <a href="{{ url('/')}}/post/delete/{{$post->id}}">
                <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                    Delete
                </button>
            </a>
        </div>
        @endif
      </article>
@endforeach
</div>
</x-app-layout>