<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category | Studio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="min-h-screen bg-slate-50 flex items-center justify-center p-6">

    <div class="w-full max-w-md bg-white rounded-[2.5rem] shadow-xl border border-slate-100 p-8 md:p-10 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-emerald-400 to-teal-500"></div>

        <div class="mb-8">
            <h1 class="text-2xl font-extrabold text-slate-900">New Category</h1>
            <p class="text-slate-500 text-sm mt-1 font-medium">Group your posts by creating a new topic.</p>
        </div>

        <form action="/categories" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label for="name" class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Category Name</label>
                <div class="relative group">
                    <input type="text" id="name" name="name"
                        class="w-full px-5 py-4 bg-slate-50 border @error('name') border-red-500 @else border-slate-200 @enderror rounded-2xl focus:outline-none focus:ring-4 focus:ring-emerald-50 focus:border-emerald-500 transition-all text-slate-900 font-semibold placeholder:font-normal placeholder:text-slate-400"
                        placeholder="e.g. Web Development">
                    <div class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-emerald-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                    </div>
                </div>
            </div>

            <div>
                <label for="description" class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Short Description (Optional)</label>
                <textarea id="description" name="description" rows="3"
                    class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-emerald-50 focus:border-emerald-500 transition-all text-slate-900 font-medium placeholder:font-normal"
                    placeholder="Briefly describe this category..."></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4 pt-2">
                <a href="/categories/index" class="flex items-center justify-center py-4 bg-slate-100 text-slate-600 font-bold rounded-2xl hover:bg-slate-200 transition-all text-sm">
                    Cancel
                </a>
                <button type="submit" 
                    class="py-4 bg-emerald-600 text-white font-bold rounded-2xl shadow-lg shadow-emerald-100 hover:bg-emerald-700 hover:-translate-y-1 transition-all active:scale-95 text-sm">
                    Create Now
                </button>
            </div>
        </form>
    </div>

</body>
</html>