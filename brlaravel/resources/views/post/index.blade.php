<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Post Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body class="p-6 md:p-12">

    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-16 gap-6">
            <div>
                <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight">Creative <span class="gradient-text">Studio.</span></h1>
             </div>
            
            <a href="/post/create" class="group relative inline-flex items-center gap-2 px-8 py-4 bg-slate-900 text-white font-bold rounded-2xl transition-all hover:bg-indigo-600 hover:shadow-[0_20px_50px_rgba(79,70,229,0.3)] overflow-hidden">
                <span class="relative z-10 text-sm uppercase tracking-widest">add post</span>
                <i class="fas fa-arrow-right relative z-10 group-hover:translate-x-1 transition-transform"></i>
            </a>
            <a href="/categories/index" class="group relative inline-flex items-center gap-2 px-8 py-4 bg-slate-900 text-white font-bold rounded-2xl transition-all hover:bg-indigo-600 hover:shadow-[0_20px_50px_rgba(79,70,229,0.3)] overflow-hidden">
                <span class="relative z-10 text-sm uppercase tracking-widest">category page</span>
                <i class="fas fa-arrow-right relative z-10 group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

        <div class="mb-8">
            <form action="/post/index" method="GET">
                <select name="category" class="p-3 rounded-xl border">
                    <option>All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
           <button type="submit" class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-50 text-slate-400 hover:bg-red-50 hover:text-red-600 transition-all" title="Delete">serch</button>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            @foreach($posts as $post)
            <div class="post-card group relative bg-white border border-slate-100 rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500">
                <div class="h-56 overflow-hidden relative bg-slate-100">
                    <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80" alt="post" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute top-4 left-4">
                        <span class="bg-white/90 backdrop-blur px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest text-indigo-600">
                            {{ $post->category->name}}
                        </span>
                    </div>
                </div>
                
                <div class="p-8">
                    <h3 class="text-xl font-bold text-slate-900 mb-4 line-clamp-2 leading-snug group-hover:text-indigo-600 transition-colors">
                        {{ $post->title }}
                    </h3>

                    <p class="text-slate-500 text-sm line-clamp-3 mb-6">
                        {{ $post->category->name }}
                    </p>
                    
                    <p class="text-slate-500 text-sm line-clamp-3 mb-6">
                        {{ $post->body }}
                    </p>
                    
                    <div class="flex items-center justify-between pt-6 border-t border-slate-50">
                        <div class="flex gap-4">
                            <a href="{{route('post.edit', $post)}}" class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-50 text-slate-400 hover:bg-indigo-50 hover:text-indigo-600 transition-all" title="Edit">
                                <i class="fas fa-pen-nib text-sm"></i>
                            </a>
                            
                            <form action="{{ route('post.destroy', $post) }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-50 text-slate-400 hover:bg-red-50 hover:text-red-600 transition-all" title="Delete">
                                    <i class="fas fa-trash-alt text-sm"></i>
                                </button>
                            </form>
                        </div>
                        <span class="text-xs font-bold text-slate-300 uppercase tracking-widest leading-none">ID: #{{ $post->id }}</span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

</body>
</html>