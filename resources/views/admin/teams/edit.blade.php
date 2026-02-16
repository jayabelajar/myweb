@extends('admin.layouts.app')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-white">Edit Team Member</h1>
        <p class="text-sm text-zinc-500">Update anggota tim.</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.teams.update', $team) }}" enctype="multipart/form-data" class="space-y-5">
    @csrf
    @method('PUT')
    @if (request('drawer'))
        <input type="hidden" name="drawer" value="1">
    @endif
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Name</label>
            <input name="name" value="{{ old('name', $team->name) }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" required>
        </div>
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Role</label>
            <input name="role" value="{{ old('role', $team->role) }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" required>
        </div>
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Photo</label>
            <input type="file" name="photo_url" accept="image/*" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">
            <p class="mt-2 text-[11px] text-zinc-500">Upload foto baru untuk mengganti yang lama.</p>
            @if ($team->photo_url)
                @php
                    $photo = $team->photo_url;
                    $photoUrl = \Illuminate\Support\Str::startsWith($photo, ['http://', 'https://', '//'])
                        ? $photo
                        : asset('storage/' . $photo);
                @endphp
                <div class="mt-3">
                    <img src="{{ $photoUrl }}" alt="{{ $team->name }}" class="w-24 h-24 rounded-2xl object-cover border border-white/10">
                </div>
            @endif
        </div>
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $team->sort_order) }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">
        </div>
        <div class="md:col-span-2">
            <label class="text-xs uppercase tracking-widest text-zinc-500">Bio</label>
            <textarea name="bio" rows="4" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">{{ old('bio', $team->bio) }}</textarea>
        </div>
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">GitHub URL</label>
            <input name="github_url" value="{{ old('github_url', $team->github_url) }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" placeholder="https://github.com/username">
        </div>
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">LinkedIn URL</label>
            <input name="linkedin_url" value="{{ old('linkedin_url', $team->linkedin_url) }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" placeholder="https://linkedin.com/in/username">
        </div>
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Instagram URL</label>
            <input name="instagram_url" value="{{ old('instagram_url', $team->instagram_url) }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" placeholder="https://instagram.com/username">
        </div>
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Dribbble URL</label>
            <input name="dribbble_url" value="{{ old('dribbble_url', $team->dribbble_url) }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" placeholder="https://dribbble.com/username">
        </div>
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Behance URL</label>
            <input name="behance_url" value="{{ old('behance_url', $team->behance_url) }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" placeholder="https://behance.net/username">
        </div>
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Twitter/X URL</label>
            <input name="twitter_url" value="{{ old('twitter_url', $team->twitter_url) }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" placeholder="https://x.com/username">
        </div>
        <div class="md:col-span-2 flex items-center gap-2">
            <input type="checkbox" name="is_active" value="1" class="rounded border-white/20 bg-black/40" {{ old('is_active', $team->is_active) ? 'checked' : '' }}>
            <span class="text-sm text-zinc-400">Active</span>
        </div>
    </div>

    <div class="flex items-center gap-3">
        <button type="submit" class="inline-flex items-center justify-center rounded-full border border-white/10 px-6 py-2 text-xs uppercase tracking-widest text-white hover:border-white/30">Update</button>
        <a href="{{ route('admin.teams.index') }}" class="text-xs uppercase tracking-widest text-zinc-400 hover:text-white">Cancel</a>
    </div>
</form>
@endsection
