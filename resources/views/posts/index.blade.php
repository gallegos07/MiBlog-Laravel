<x-app-layout>
   <div class="container py-8">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
         @foreach ($posts as $post)        
            <article  class="w-full h-80 bg-cover bg-center  @if($loop->first) md:col-span-2 @endif" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)),url(@if($post->image) {{Storage::url($post->image->url)}} @else https://cdn.pixabay.com/photo/2020/04/24/10/23/pier-5086290_960_720.jpg @endif);">
               <div class="w-full h-full px-8 flex flex-col justify-center">
                  <div>
                     @foreach ($post->tags as $tag)
                         <a class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full mr-1 mb-2" href="{{route('posts.tag', $tag)}}">{{$tag->name}}</a>
                     @endforeach
                  </div>
                  
                  <h1 class="text-3xl text-white leading-8 font-bold mt-2">
                     <a class="" href="{{route('posts.show', $post)}}">
                        {{$post->name}}
                     </a>
                  </h1>             
               </div>         
            </article>             
         @endforeach
      </div>

      <div class="mt-4">
         {{$posts->links()}}
      </div>
   </div>
</x-app-layout>