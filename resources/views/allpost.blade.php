<script>
  const like=(postid)=>{

    let text=document.getElementById(postid)
    let count=document.getElementById("count-"+postid)
    const sub=()=>{
      text.innerText="🩶";
      axios.get(`/post/like/remove/${postid}`).then(res=>{
        console.log(res)
            count.innerText=(parseInt(count.innerText)-1).toString() +" people liked";
          })
        }
    const add=()=>{
      text.innerText="💙";
      axios.get(`/post/like/add/${postid}`).then(res=>{
        count.innerText=(parseInt(count.innerText)+1).toString() +" people liked";
      })
      
    }
    text.innerText=="💙"?sub():add()
  }
</script>
<div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
@foreach ($posts as $post)
<article class="h-max px-10 flex max-w-xl flex-col items-start justify-between">
        <div class="group relative main">
          <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
            <a href="#">
              <span class="absolute inset-0"></span>
              {{ $post->title }}
            </a>
          </h3>
          <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ $post->content }}</p>
        </div>
        @auth
        <button id="" onclick="like({{$post->id}})">
          <span class="heart" id="{{$post->id}}" >🩶</span>
        </button>
        @foreach($likes as $like)
        @if($like['post_id']==$post->id)
          <script>
            document.getElementById("{{$post->id}}").innerText="💙"
          </script>
        @endif
        @endforeach
        @endauth
        <span id="count-{{$post->id}}" >{{ $post->like_count }} people liked</span>
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
<style>
  .main{
    border:1px solid;
    min-height: 100%;
    width:100%;
    padding: 10px;
  }
  .heart{
    font-size: 40px;
  }
</style>

