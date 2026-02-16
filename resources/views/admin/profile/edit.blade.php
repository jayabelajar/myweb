@extends('admin.layouts.app')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-white">Profile</h1>
        <p class="text-sm text-zinc-500">Kelola informasi akun admin.</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-[360px_1fr] gap-6">
    <div class="bg-zinc-900/20 border border-white/5 rounded-2xl p-6">
        <div class="flex items-center gap-4">
            @if ($user?->avatar)
                <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}" class="w-16 h-16 rounded-2xl object-cover border border-white/10">
            @else
                <div class="w-16 h-16 rounded-2xl border border-white/10 bg-white/5 flex items-center justify-center text-sm font-semibold text-white">
                    {{ collect(explode(' ', $user->name))->map(fn($p) => strtoupper(substr($p, 0, 1)))->implode('') }}
                </div>
            @endif
            <div>
                <div class="text-lg font-semibold text-white">{{ $user->name }}</div>
                <div class="text-xs text-zinc-500">{{ $user->role ?? 'Administrator' }}</div>
                <div class="text-xs text-zinc-500 mt-1">{{ $user->email }}</div>
            </div>
        </div>
        <div class="mt-6 border-t border-white/5 pt-4 text-xs text-zinc-500">
            Terakhir diperbarui: {{ $user->updated_at?->format('d M Y, H:i') }}
        </div>
    </div>

    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="bg-zinc-900/20 border border-white/5 rounded-2xl p-6 space-y-5">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="text-xs uppercase tracking-widest text-zinc-500">Name</label>
                <input name="name" value="{{ old('name', $user->name) }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" required>
            </div>
            <div>
                <label class="text-xs uppercase tracking-widest text-zinc-500">Role</label>
                <input name="role" value="{{ old('role', $user->role) }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" placeholder="Administrator">
            </div>
            <div class="md:col-span-2">
                <label class="text-xs uppercase tracking-widest text-zinc-500">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" required>
            </div>
            <div class="md:col-span-2">
                <label class="text-xs uppercase tracking-widest text-zinc-500">Avatar</label>
                <input type="file" name="avatar" accept="image/*" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">
                <p class="mt-2 text-[11px] text-zinc-500">Upload avatar baru. Maks 4MB.</p>
            </div>
        </div>

        <div class="border-t border-white/5 pt-5">
            <div class="text-xs uppercase tracking-widest text-zinc-500 mb-3">Change Password</div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="text-xs uppercase tracking-widest text-zinc-500">New Password</label>
                    <input type="password" name="password" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" placeholder="Minimal 8 karakter">
                </div>
                <div>
                    <label class="text-xs uppercase tracking-widest text-zinc-500">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">
                </div>
            </div>
        </div>

        <div class="flex items-center gap-3 justify-end">
            <button type="submit" class="inline-flex items-center justify-center rounded-full border border-white/10 px-6 py-2 text-xs uppercase tracking-widest text-white hover:border-white/30">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection
