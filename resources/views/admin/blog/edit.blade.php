@extends('admin.layouts.app')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-white">Edit Post</h1>
        <p class="text-sm text-zinc-500">Update konten blog.</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.blog.update', $post) }}" enctype="multipart/form-data" class="space-y-5">
    @csrf
    @method('PUT')
    @if (request('drawer'))
        <input type="hidden" name="drawer" value="1">
    @endif
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Category</label>
            <select name="category_id" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" required>
                <option value="">Pilih Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Title</label>
            <input name="title" value="{{ old('title', $post->title) }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" required>
        </div>
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Slug</label>
            <input name="slug" value="{{ old('slug', $post->slug) }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">
        </div>
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Author</label>
            <input name="author" value="{{ old('author', $post->author) }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">
        </div>
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Published At</label>
            <input type="date" name="published_at" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d')) }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">
        </div>
        <div class="md:col-span-2">
            <label class="text-xs uppercase tracking-widest text-zinc-500">Image</label>
            <input type="file" name="image" accept="image/*" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">
            <p class="mt-2 text-[11px] text-zinc-500">Upload gambar baru untuk mengganti yang lama.</p>
            @if ($post->image)
                <div class="mt-3">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-40 h-24 rounded-xl object-cover border border-white/10">
                </div>
            @endif
        </div>
        <div class="md:col-span-2">
            <label class="text-xs uppercase tracking-widest text-zinc-500">Excerpt</label>
            <textarea name="excerpt" rows="3" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" required>{{ old('excerpt', $post->excerpt) }}</textarea>
        </div>
        <div class="md:col-span-2">
            <label class="text-xs uppercase tracking-widest text-zinc-500">Intro</label>
            <textarea name="intro" rows="3" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">{{ old('intro', $post->intro) }}</textarea>
        </div>
        <div class="md:col-span-2">
            <label class="text-xs uppercase tracking-widest text-zinc-500">Content (Markdown)</label>
            @php
                $contentValue = old('content', $post->content ?? '');
                if ($contentValue === '' && !empty($post->sections)) {
                    $blocks = [];
                    foreach ($post->sections as $section) {
                        $title = trim((string) ($section['title'] ?? ''));
                        $text = trim((string) ($section['text'] ?? ''));
                        if ($title !== '') {
                            $blocks[] = '## ' . $title;
                        }
                        if ($text !== '') {
                            $blocks[] = $text;
                        }
                    }
                    $contentValue = implode("\n\n", $blocks);
                }
            @endphp
            <textarea name="content" rows="10" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">{{ $contentValue }}</textarea>
            <p class="mt-2 text-[11px] text-zinc-500">Gunakan Markdown: `# Judul`, `## Subjudul`, list `- item`, gambar `![alt](url)`, dan pisahkan paragraf dengan satu baris kosong.</p>
        </div>
        <div class="md:col-span-2">
            <label class="text-xs uppercase tracking-widest text-zinc-500">Tags</label>
            <select name="tags[]" multiple class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" {{ collect(old('tags', $post->tags->pluck('id')->all()))->contains($tag->id) ? 'selected' : '' }}>{{ $tag->name }}</option>
                @endforeach
            </select>
            <p class="text-[11px] text-zinc-500 mt-2">Gunakan Ctrl/Cmd untuk multi-select.</p>
        </div>
    </div>

    <div class="flex items-center gap-3">
        <button type="submit" class="inline-flex items-center justify-center rounded-full border border-white/10 px-6 py-2 text-xs uppercase tracking-widest text-white hover:border-white/30">Update</button>
        <a href="{{ route('admin.blog.index') }}" class="text-xs uppercase tracking-widest text-zinc-400 hover:text-white">Cancel</a>
    </div>
</form>
@endsection
