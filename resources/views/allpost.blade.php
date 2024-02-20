<div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
@foreach ($posts as $post)
<article class=" px-10 flex max-w-xl flex-col items-start justify-between">
        <div class="group relative">
          <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
            <a href="#">
              <span class="absolute inset-0"></span>
              {{ $post->title }}
            </a>
          </h3>
          <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ $post->content }}</p>
        </div>
        <div class="relative mt-8 flex items-center gap-x-4">
          <img src="https://api.dicebear.com/7.x/fun-emoji/svg?seed={{$post->author}}" alt="" class="h-10 w-10 rounded-full bg-gray-50">
          <div class="text-sm leading-6">
            <p class="font-semibold text-gray-900">
              <a href="#">
                <span class="absolute inset-0"></span>
                {{ $post->author }}
              </a>
            </p>
          </div>
        </div>
      </article>
@endforeach
</div>
