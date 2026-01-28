<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Post | Studio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-slate-50 flex items-center justify-center p-4 md:p-10">

    <div class="w-full max-w-3xl">
        <a href="/post/index" class="inline-flex items-center text-sm font-semibold text-indigo-600 mb-6 hover:text-indigo-800 transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Back to Dashboard
        </a>

        <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-indigo-100/50 border border-white overflow-hidden">
            <div class="flex flex-col md:flex-row">
                
                <div class="bg-indigo-600 md:w-1/3 p-10 text-white flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold leading-tight">Share your thoughts with the world.</h2>
                        <p class="text-indigo-100 mt-4 text-sm leading-relaxed">Fill in the details to publish your new masterpiece.</p>
                    </div>
                    <div class="mt-10 md:mt-0">
                        <span class="text-xs font-bold uppercase tracking-widest text-indigo-200">Tip:</span>
                        <p class="text-xs text-indigo-100 mt-1 italic">Images can be added after saving.</p>
                    </div>
                </div>

                <div class="flex-1 p-8 md:p-12">
                    <form action="{{ route('posts.store') }}" method="POST" class="space-y-6">
                        @csrf <div>
                            <label for="title" class="block text-sm font-bold text-slate-700 mb-2 ml-1">Post Title</label>
                            <input type="text" id="title" name="title" required
                                class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 transition-all text-slate-900 placeholder:text-slate-400"
                                placeholder="What's on your mind?">
                        </div>

                        <div>
                            <label for="category_id" class="block text-sm font-bold text-slate-700 mb-2 ml-1">Choose Category</label>
                            <div class="relative">
                                <select name="category_id" id="category_id" required
                                    class="w-full appearance-none px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 transition-all text-slate-900">
                                    <option value="" disabled selected>Select a category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none text-slate-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="body" class="block text-sm font-bold text-slate-700 mb-2 ml-1">Content Body</label>
                            <textarea id="body" name="body" required rows="5"
                                class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 transition-all text-slate-900 placeholder:text-slate-400"
                                placeholder="Start writing your story..."></textarea>
                        </div>

                        <div class="pt-4">
                            <button type="submit" 
                                class="w-full py-4 bg-indigo-600 text-white font-extrabold rounded-2xl shadow-lg shadow-indigo-200 hover:bg-indigo-700 hover:-translate-y-1 transition-all active:scale-95">
                                Publish Post
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</body>
</html>