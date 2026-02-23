@extends('admin.layouts.app')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-white">Edit Project</h1>
        <p class="text-sm text-zinc-500">Update project untuk halaman publik.</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data" class="space-y-5">
    @csrf
    @method('PUT')
    @if (request('drawer'))
        <input type="hidden" name="drawer" value="1">
    @endif
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Title</label>
            <input name="title" value="{{ old('title', $project->title) }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" required>
        </div>
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Slug</label>
            <input name="slug" value="{{ old('slug', $project->slug) }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">
        </div>
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Category</label>
            <input name="category" value="{{ old('category', $project->category) }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" required>
        </div>
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Image</label>
            <input type="file" name="image" accept="image/*" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">
            <p class="mt-2 text-[11px] text-zinc-500">Upload gambar baru untuk mengganti yang lama.</p>
            @if ($project->image)
                @php
                    $image = $project->image;
                    $imageUrl = \Illuminate\Support\Str::startsWith($image, ['http://', 'https://', '//'])
                        ? $image
                        : asset('storage/' . $image);
                @endphp
                <div class="mt-3">
                    <img src="{{ $imageUrl }}" alt="{{ $project->title }}" class="w-40 h-24 rounded-xl object-cover border border-white/10">
                </div>
            @endif
        </div>
        <div class="md:col-span-2">
            <label class="text-xs uppercase tracking-widest text-zinc-500">Description</label>
            <textarea name="description" rows="4" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" required>{{ old('description', $project->description) }}</textarea>
        </div>
        <div class="md:col-span-2">
            <label class="text-xs uppercase tracking-widest text-zinc-500">Stack (comma separated)</label>
            <input name="stack" value="{{ old('stack', $project->stack ? implode(', ', $project->stack) : '') }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">
        </div>
        <div class="md:col-span-2">
            <label class="text-xs uppercase tracking-widest text-zinc-500">Link</label>
            <input name="link" value="{{ old('link', $project->link) }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" placeholder="https://">
        </div>
    </div>

    <div class="flex items-center gap-3">
        <button type="submit" class="inline-flex items-center justify-center rounded-full border border-white/10 px-6 py-2 text-xs uppercase tracking-widest text-white hover:border-white/30">Update</button>
        <a href="{{ route('admin.projects.index') }}" class="text-xs uppercase tracking-widest text-zinc-400 hover:text-white">Cancel</a>
    </div>
</form>
@endsection
