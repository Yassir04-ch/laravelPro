<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories | Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
   
</head>
<body class="antialiased p-6 md:p-12">

    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-4">
            <div>
                <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight">Categories</h1>
                <p class="text-slate-500 mt-1 font-medium">Manage and organize your post topics.</p>
            </div>
            <a href="/categories/create" class="inline-flex items-center px-6 py-3 bg-emerald-600 text-white font-bold rounded-2xl hover:bg-emerald-700 shadow-lg shadow-emerald-200 transition-all">
                <i class="fas fa-plus-circle mr-2"></i> Add New Category
            </a>
            <a href="/post/index" class="group relative inline-flex items-center gap-2 px-8 py-4 bg-slate-900 text-white font-bold rounded-2xl transition-all hover:bg-indigo-600 hover:shadow-[0_20px_50px_rgba(79,70,229,0.3)] overflow-hidden">
                <span class="relative z-10 text-sm uppercase tracking-widest">posts</span>
                <i class="fas fa-arrow-right relative z-10 group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

       <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
       @foreach($categories as $category)
        <div class="category-card bg-white rounded-[2.5rem] border border-slate-100 p-8 shadow-sm hover:shadow-xl transition-all duration-300 group relative">
            
            <div class="flex justify-between items-start mb-6">
                <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center text-2xl font-black uppercase">
                    {{$category->name}}
                </div>
                
                <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <a href="{{route('categories.edit', $category)}}" class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-50 text-slate-400 hover:bg-blue-50 hover:text-blue-600 transition-all">
                        <i class="fas fa-pen text-sm"></i>
                    </a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-50 text-slate-400 hover:bg-red-50 hover:text-red-600 transition-all">
                            <i class="fas fa-trash-alt text-sm"></i>
                        </button>
                    </form>
                </div>
            </div>

            <h3 class="text-xl font-bold text-slate-900 mb-2">{{ $category->name }}</h3>
            <p class="text-slate-500 text-sm line-clamp-3 mb-6">
                {{ $category->description }}
            </p>

            <div class="mt-auto pt-6 border-t border-slate-50 flex items-center justify-between text-xs font-bold uppercase tracking-widest">
                <a href="/post/index" class="text-emerald-600 hover:translate-x-1 transition-transform inline-flex items-center">
                    View Posts <i class="fas fa-chevron-right ml-2 text-[10px]"></i>
                </a>
            </div>
          </div>
             @endforeach
        </div>
        <!-- 
            <div class="bg-slate-50 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-folder-open text-slate-300 text-3xl"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-900">No categories found</h3>
            <p class="text-slate-500 mt-2">Start by creating your first category to organize your blog.</p>
        </div> -->
    </div>

</body>
</html>