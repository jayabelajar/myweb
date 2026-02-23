<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | VeritasDev</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Space Grotesk', sans-serif;
            background-color: #07090c;
            color: #b3b3b8;
            background-image:
                radial-gradient(1200px 600px at 10% -10%, rgba(59, 130, 246, 0.08), transparent 60%),
                radial-gradient(900px 500px at 90% -20%, rgba(59, 130, 246, 0.08), transparent 60%),
                radial-gradient(800px 500px at 50% 120%, rgba(244, 63, 94, 0.06), transparent 60%);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center px-6">
    <section class="w-full max-w-md">
        <div class="text-center mb-10">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-white/10 bg-white/5 text-[10px] font-mono text-sky-400 tracking-widest uppercase mb-6">
                <span class="w-1.5 h-1.5 rounded-full bg-sky-500 animate-pulse"></span>
                Admin Access
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-3">Login Admin</h1>
            <p class="text-sm text-zinc-500">Halaman ini tidak dipublikasikan di menu.</p>
        </div>

        <div class="bg-zinc-900/30 border border-white/5 rounded-2xl p-6">
            @if (session('error'))
                <div class="mb-4 rounded-xl border border-red-500/30 bg-red-500/10 px-4 py-3 text-xs text-red-200">
                    {{ session('error') }}
                </div>
            @endif
            <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="text-xs uppercase tracking-widest text-zinc-500">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="admin@veritasdev.com" required class="mt-2 w-full rounded-xl border border-white/10 bg-zinc-900/60 px-4 py-3 text-sm text-white placeholder:text-zinc-600 focus:outline-none focus:ring-2 focus:ring-sky-400/60">
                </div>
                <div>
                    <label class="text-xs uppercase tracking-widest text-zinc-500">Password</label>
                    <div class="relative mt-2">
                        <input id="admin-login-password" type="password" name="password" placeholder="********" required class="w-full rounded-xl border border-white/10 bg-zinc-900/60 px-4 py-3 pr-12 text-sm text-white placeholder:text-zinc-600 focus:outline-none focus:ring-2 focus:ring-sky-400/60">
                        <button type="button" class="absolute inset-y-0 right-0 px-4 text-zinc-500 hover:text-white" data-password-toggle data-password-target="admin-login-password" aria-label="Toggle password visibility">
                            <svg viewBox="0 0 24 24" class="w-4 h-4 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6-10-6-10-6z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                    </div>
                </div>
                <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-full bg-white px-5 py-3 text-xs font-bold uppercase tracking-widest text-black hover:bg-zinc-200 transition-transform hover:scale-[1.02]">
                    Sign In
                </button>
            </form>
        </div>
    </section>
    <script>
        document.querySelectorAll('[data-password-toggle]').forEach((btn) => {
            btn.addEventListener('click', () => {
                const targetId = btn.getAttribute('data-password-target');
                const input = targetId ? document.getElementById(targetId) : null;
                if (!input) return;
                input.type = input.type === 'password' ? 'text' : 'password';
            });
        });
    </script>
</body>
</html>
