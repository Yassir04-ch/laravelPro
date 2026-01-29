<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category | Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="antialiased p-6 md:p-12 bg-slate-50">

    <div class="max-w-3xl mx-auto">
        <div class="flex items-center justify-between mb-12">
            <div>
                <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight">Edit Category</h1>
                <p class="text-slate-500 mt-1 font-medium">Modify the details of: <span class="text-indigo-600">{{ $category->name }}</span></p>
            </div>
            <a href="/post/index" class="text-slate-400 hover:text-slate-600 transition-all">
                <i class="fas fa-times text-2xl"></i>
            </a>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-slate-100 p-10 shadow-xl">
            <form action="{{route('categories.update' , $category)}}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase mb-3 tracking-widest">Category Name</label>
                    <input type="text" name="name" value="{{ $category->name }}" 
                        class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-400 outline-none transition-all text-slate-700 font-medium"
                        placeholder="e.g. Technology">
                
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase mb-3 tracking-widest">Description</label>
                    <textarea name="description" rows="5" 
                        class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-400 outline-none transition-all text-slate-700 font-medium"
                        placeholder="What is this category about?">{{ $category->description }}</textarea>
                
                </div>

                <button type="submit" class="w-full py-5 bg-indigo-600 text-white font-bold rounded-2xl hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition-all flex items-center justify-center gap-3">
                    <i class="fas fa-save"></i>
                    Update Category
                </button>
            </form>
        </div>
    </div>

</body>
</html>