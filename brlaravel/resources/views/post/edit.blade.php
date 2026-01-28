<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post | Creative Studio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-[#f8fafc] min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-2xl bg-white rounded-[2rem] shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100 overflow-hidden">
        <div class="bg-slate-900 px-8 py-10 text-white relative">
            <div class="relative z-10">
                <h1 class="text-3xl font-bold">Edit Post</h1>
                <p class="text-slate-400 mt-2">Modify the details of your article below.</p>
            </div>
            <div class="absolute top-[-20%] right-[-10%] w-64 h-64 bg-indigo-600/20 rounded-full blur-3xl"></div>
        </div>

        <form action="{{ route('post.update',$post) }}" method="POST" class="p-8 md:p-12 space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-bold text-slate-700 mb-2 ml-1">Article Title</label>
                <input type="text" id="title" name="title" value="{{$post->titel}}" required
                    class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 transition-all duration-200 text-slate-900 font-medium placeholder:text-slate-400"
                    placeholder="Enter a catchy title...">
            </div>

            <div>
                <label for="category_id" class="block text-sm font-bold text-slate-700 mb-2 ml-1">Category</label>
                <div class="relative">
                    <select name="category_id" id="category_id" required
                        class="w-full appearance-none px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 transition-all duration-200 text-slate-900 font-medium">
                    @foreach($categories as $category)
                        <option value="{{ $category->id}}">{{ $category->name}}</option>
                    @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none text-slate-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
            </div>

            <div>
                <label for="body" class="block text-sm font-bold text-slate-700 mb-2 ml-1">Content</label>
                <textarea id="body" name="body" required rows="3"
                    class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 transition-all duration-200 text-slate-900 font-medium placeholder:text-slate-400"
                    placeholder="Write your story here...">{{$post->body}}</textarea>
            </div>

            <div class="flex flex-col sm:flex-row items-center gap-4 pt-4">
                <button type="submit" 
                    class="w-full sm:w-auto px-10 py-4 bg-indigo-600 text-white font-bold rounded-2xl hover:bg-indigo-700 hover:shadow-lg hover:shadow-indigo-200 transition-all active:scale-95">
                    Update Post
                </button>
                <a href="#" class="w-full sm:w-auto px-10 py-4 bg-white text-slate-500 font-bold rounded-2xl border border-slate-200 hover:bg-slate-50 hover:text-slate-700 transition-all text-center">
                    Cancel
                </a>
            </div>
        </form>
    </div>

</body>
</html>