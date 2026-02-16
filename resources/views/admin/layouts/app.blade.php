<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin' }} | VeritasDev</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #0f141a;
            --text-muted: #c7ccd2;
            --border-color: rgba(255, 255, 255, 0.05);
        }

        body {
            font-family: 'Space Grotesk', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-muted);
            background-image:
                radial-gradient(1200px 600px at 10% -10%, rgba(16, 185, 129, 0.04), transparent 60%),
                radial-gradient(900px 500px at 90% -20%, rgba(59, 130, 246, 0.04), transparent 60%),
                radial-gradient(800px 500px at 50% 120%, rgba(244, 63, 94, 0.03), transparent 60%);
        }

        .grid-bg {
            background-image:
                linear-gradient(to right, rgba(255, 255, 255, 0.04) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.04) 1px, transparent 1px);
            background-size: 40px 40px;
            mask-image: radial-gradient(circle at 50% 0%, black 45%, transparent 100%);
            -webkit-mask-image: radial-gradient(circle at 50% 0%, black 45%, transparent 100%);
            opacity: 0.1;
        }

        .ambient-glow {
            background: radial-gradient(circle at 50% -20%, rgba(16, 185, 129, 0.06), transparent 70%);
            filter: blur(80px);
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .sidebar-collapsed #admin-sidebar {
            width: 4.5rem;
            transform: translateX(0) !important;
        }

        .sidebar-collapsed #admin-main {
            padding-left: 4.5rem !important;
        }

        .sidebar-collapsed .sidebar-label {
            opacity: 0;
            width: 0;
            height: 0;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }

        .sidebar-collapsed .sidebar-submenu,
        .sidebar-collapsed .sidebar-submenu-toggle svg:last-child {
            display: none !important;
        }

        .sidebar-collapsed .sidebar-brand-text {
            display: none;
        }

        .sidebar-collapsed .sidebar-link {
            justify-content: center;
        }

        .admin-header-fixed {
            position: fixed;
            top: 0;
            right: 0;
            left: 18rem;
        }

        .sidebar-collapsed .admin-header-fixed {
            left: 4.5rem;
        }

        .sidebar-collapsed .sidebar-section-label {
            display: none;
        }

        .sidebar-collapsed .sidebar-nav {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
        }

        .sidebar-collapsed .sidebar-link,
        .sidebar-collapsed .sidebar-submenu-toggle {
            width: 3rem;
            height: 3rem;
            margin-left: auto;
            margin-right: auto;
            justify-content: center;
        }

        .sidebar-collapsed .sidebar-link svg,
        .sidebar-collapsed .sidebar-submenu-toggle svg {
            margin: 0;
        }

        .sidebar-collapsed .sidebar-footer-text,
        .sidebar-collapsed .sidebar-logout {
            display: none;
        }
    </style>
@php
    $isDrawer = request()->boolean('drawer');
@endphp
</head>
<body class="min-h-screen antialiased" id="admin-body">
    <div class="fixed inset-0 grid-bg -z-20 pointer-events-none"></div>
    <div class="fixed top-0 left-0 right-0 h-[520px] ambient-glow -z-10 pointer-events-none"></div>

    @if (!$isDrawer)
    <div id="admin-overlay" class="hidden fixed inset-0 bg-black/35 z-40 lg:hidden"></div>

    <div class="min-h-screen flex">
        <aside id="admin-sidebar" class="fixed inset-y-0 left-0 w-72 bg-[#0e1318]/92 border-r border-white/5 backdrop-blur-xl transform -translate-x-full lg:translate-x-0 transition-transform duration-300 z-50">
            <div class="h-full flex flex-col">
                <div class="h-16 px-6 flex items-center border-b border-white/5">
                    <a href="{{ route('admin.index') }}" class="flex items-center gap-3 text-zinc-100 font-semibold">
                        <span class="w-9 h-9 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center">
                            <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2L2 22h20L12 2z"></path>
                            </svg>
                        </span>
                        <span class="sidebar-brand-text">VeritasDev Admin</span>
                    </a>
                </div>

                <div class="sidebar-nav flex-1 overflow-y-auto no-scrollbar px-4 py-6 space-y-6">
                    <div>
                        <div class="sidebar-section-label text-[11px] uppercase tracking-widest text-zinc-500/80 mb-3">Admin Menu</div>
                        <nav class="space-y-2 text-sm">
                            <a href="{{ route('admin.index') }}" class="sidebar-link flex items-center gap-3 px-3 py-2 rounded-xl {{ request()->routeIs('admin.index') ? 'bg-white/5 text-zinc-100' : 'text-zinc-400 hover:text-zinc-100 hover:bg-white/5' }}">
                                <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7"></path><path d="M9 22V12h6v10"></path></svg>
                                <span class="sidebar-label">Dashboard</span>
                            </a>
                            <a href="{{ route('admin.projects.index') }}" class="sidebar-link flex items-center gap-3 px-3 py-2 rounded-xl {{ request()->routeIs('admin.projects.*') ? 'bg-white/5 text-zinc-100' : 'text-zinc-400 hover:text-zinc-100 hover:bg-white/5' }}">
                                <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect></svg>
                                <span class="sidebar-label">Projects</span>
                            </a>
                            <div class="space-y-1">
                                <button type="button" class="sidebar-submenu-toggle w-full flex items-center justify-between gap-3 px-3 py-2 rounded-xl {{ request()->routeIs('admin.services.*') || request()->routeIs('admin.workflows.*') || request()->routeIs('admin.pricing.*') ? 'bg-white/5 text-zinc-100' : 'text-zinc-400 hover:text-zinc-100 hover:bg-white/5' }}" data-submenu-toggle="services">
                                    <span class="flex items-center gap-3">
                                        <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16"></path><path d="M4 12h16"></path><path d="M4 18h16"></path></svg>
                                        <span class="sidebar-label">Services</span>
                                    </span>
                                    <svg viewBox="0 0 24 24" class="w-4 h-4 transition-transform duration-200" data-submenu-icon="services" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M6 9l6 6 6-6"></path>
                                    </svg>
                                </button>
                                <div class="sidebar-submenu ml-7 space-y-1 text-[12px] {{ request()->routeIs('admin.services.*') || request()->routeIs('admin.workflows.*') || request()->routeIs('admin.pricing.*') ? '' : 'hidden' }}" data-submenu="services">
                                    <a href="{{ route('admin.workflows.index') }}" class="block px-3 py-2 rounded-lg text-zinc-500 hover:text-zinc-200 hover:bg-white/5">Workflow</a>
                                    <a href="{{ route('admin.pricing.index') }}" class="block px-3 py-2 rounded-lg text-zinc-500 hover:text-zinc-200 hover:bg-white/5">Pricing</a>
                                </div>
                            </div>
                            <a href="{{ route('admin.teams.index') }}" class="sidebar-link flex items-center gap-3 px-3 py-2 rounded-xl {{ request()->routeIs('admin.teams.*') ? 'bg-white/5 text-zinc-100' : 'text-zinc-400 hover:text-zinc-100 hover:bg-white/5' }}">
                                <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="7" r="4"></circle><path d="M5 21a7 7 0 0 1 14 0"></path></svg>
                                <span class="sidebar-label">Teams</span>
                            </a>
                            <div class="space-y-1">
                                <button type="button" class="sidebar-submenu-toggle w-full flex items-center justify-between gap-3 px-3 py-2 rounded-xl {{ request()->routeIs('admin.blog.*') ? 'bg-white/5 text-zinc-100' : 'text-zinc-400 hover:text-zinc-100 hover:bg-white/5' }}" data-submenu-toggle="blog">
                                    <span class="flex items-center gap-3">
                                        <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16v16H4z"></path><path d="M8 8h8"></path><path d="M8 12h8"></path><path d="M8 16h5"></path></svg>
                                        <span class="sidebar-label">Blog</span>
                                    </span>
                                    <svg viewBox="0 0 24 24" class="w-4 h-4 transition-transform duration-200" data-submenu-icon="blog" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M6 9l6 6 6-6"></path>
                                    </svg>
                                </button>
                                <div class="sidebar-submenu ml-7 space-y-1 text-[12px] {{ request()->routeIs('admin.blog.*') ? '' : 'hidden' }}" data-submenu="blog">
                                    <a href="{{ route('admin.blog.categories.index') }}" class="block px-3 py-2 rounded-lg text-zinc-500 hover:text-zinc-200 hover:bg-white/5">Categories</a>
                                    <a href="{{ route('admin.blog.tags.index') }}" class="block px-3 py-2 rounded-lg text-zinc-500 hover:text-zinc-200 hover:bg-white/5">Tags</a>
                                </div>
                            </div>
                            <a href="{{ route('admin.contact.edit') }}" class="sidebar-link flex items-center gap-3 px-3 py-2 rounded-xl {{ request()->routeIs('admin.contact.*') ? 'bg-white/5 text-zinc-100' : 'text-zinc-400 hover:text-zinc-100 hover:bg-white/5' }}">
                                <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16v12H4z"></path><path d="M22 20H2"></path></svg>
                                <span class="sidebar-label">Contact</span>
                            </a>
                        </nav>
                    </div>

                    <!-- Quick Actions removed -->
                </div>

                <div class="px-4 pb-4 pt-2 border-t border-white/5 sidebar-footer">
                    <div class="rounded-2xl border border-white/5 bg-zinc-900/40 p-3">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-white/10 border border-white/10 flex items-center justify-center text-white text-xs">VD</div>
                            <div class="flex-1 sidebar-footer-text">
                                <div class="text-sm text-zinc-100 font-semibold">Admin</div>
                                <div class="text-[11px] text-zinc-500/70">veritasdev.com</div>
                            </div>
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button type="submit" class="sidebar-logout inline-flex items-center justify-center rounded-lg border border-white/10 p-2 text-zinc-400 hover:text-zinc-100 hover:border-white/20" title="Logout" aria-label="Logout">
                                    <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M10 16l4-4-4-4"></path>
                                        <path d="M14 12H3"></path>
                                        <path d="M21 12a9 9 0 0 0-9-9"></path>
                                        <path d="M12 21a9 9 0 0 0 9-9"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <div id="admin-main" class="flex-1 min-h-screen lg:pl-72">
            <header class="admin-header-fixed z-30 border-b border-white/5 bg-[#0e1318]/70 backdrop-blur-xl">
                <div class="px-4 sm:px-6 lg:px-10 min-h-[64px] py-3 flex items-center justify-between gap-3">
                    <div class="flex items-center gap-3 min-w-0">
                        <a href="{{ route('admin.index') }}" class="lg:hidden flex items-center gap-3 text-white font-semibold">
                            <span class="w-9 h-9 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center">
                                <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 2L2 22h20L12 2z"></path>
                                </svg>
                            </span>
                            VeritasDev Admin
                        </a>
                        <div class="hidden lg:flex items-center gap-3">
                            <button id="admin-sidebar-toggle" type="button" class="inline-flex items-center justify-center rounded-full border border-white/10 w-10 h-10 text-zinc-300 hover:text-zinc-100 hover:border-white/20" aria-label="Toggle sidebar">
                                <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M3 6h18"></path>
                                    <path d="M3 12h18"></path>
                                    <path d="M3 18h18"></path>
                                </svg>
                            </button>
                            <div class="relative w-64">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-zinc-500">
                                    <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="11" cy="11" r="7"></circle>
                                        <path d="M21 21l-4.3-4.3"></path>
                                    </svg>
                                </span>
                                <input type="text" placeholder="Search..." class="w-full rounded-full bg-black/40 border border-white/10 pl-9 pr-4 py-2 text-xs text-zinc-200 placeholder:text-zinc-600 focus:outline-none focus:ring-2 focus:ring-emerald-500/30" />
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 sm:gap-3 ml-auto justify-end">
                        <div class="relative hidden sm:block">
                            <button id="admin-profile-btn" type="button" class="inline-flex items-center justify-center rounded-full border border-white/10 w-9 h-9 text-zinc-300 hover:text-zinc-100 hover:border-white/20">
                                <span class="text-[11px] font-semibold">AD</span>
                            </button>
                            <div id="admin-profile-menu" class="hidden absolute right-0 mt-3 w-56 rounded-2xl border border-white/10 bg-[#0b0f14] shadow-2xl p-2 z-50">
                                <div class="px-3 py-3 border-b border-white/5">
                                    <div class="text-sm text-zinc-100 font-semibold">Admin</div>
                                    <div class="text-[11px] text-zinc-500/70">veritasdev.com</div>
                                </div>
                                <a href="{{ route('admin.index') }}" class="flex items-center gap-2 px-3 py-2 text-sm text-zinc-300 hover:text-zinc-100 hover:bg-white/5 rounded-lg">
                                    Profile
                                </a>
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center gap-2 px-3 py-2 text-sm text-zinc-300 hover:text-zinc-100 hover:bg-white/5 rounded-lg">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                        <button id="admin-menu-btn" type="button" class="lg:hidden inline-flex items-center justify-center rounded-full border border-white/10 px-3 py-2 text-[11px] uppercase tracking-widest text-zinc-300 hover:text-zinc-100 hover:border-white/20">
                            <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 6h16"></path>
                                <path d="M4 12h16"></path>
                                <path d="M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </header>

            <main class="px-4 sm:px-6 lg:px-10 py-24 sm:py-28">
                <div class="max-w-6xl mx-auto">
                    @if (session('success'))
                        <div class="mb-6 rounded-2xl border border-emerald-500/20 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-200">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-6 rounded-2xl border border-rose-500/20 bg-rose-500/10 px-4 py-3 text-sm text-rose-200">
                            <div class="font-semibold mb-2">Ada error:</div>
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <div id="admin-drawer-overlay" class="hidden fixed inset-0 bg-black/35 z-[60]"></div>
    <aside id="admin-drawer" class="fixed right-0 top-0 bottom-0 w-full sm:w-[420px] max-w-full bg-[#0e1318] border-l border-white/5 shadow-2xl translate-x-full transition-transform duration-300 z-[70] flex flex-col">
        <div class="h-16 px-4 flex items-center justify-between border-b border-white/5">
            <div class="text-sm text-zinc-200 font-semibold" id="admin-drawer-title">Form</div>
            <button type="button" id="admin-drawer-close" class="inline-flex items-center justify-center rounded-full border border-white/10 px-3 py-2 text-[11px] uppercase tracking-widest text-zinc-300 hover:text-zinc-100 hover:border-white/20">
                Close
            </button>
        </div>
        <div class="flex-1 overflow-y-auto">
            <iframe id="admin-drawer-frame" class="w-full h-full" src="about:blank"></iframe>
        </div>
    </aside>
    @else
        <main class="px-4 py-6">
            @if (session('success'))
                <div class="mb-6 rounded-2xl border border-emerald-500/20 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-200">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 rounded-2xl border border-rose-500/20 bg-rose-500/10 px-4 py-3 text-sm text-rose-200">
                    <div class="font-semibold mb-2">Ada error:</div>
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    @endif

    <script>
        const btn = document.getElementById('admin-menu-btn');
        const sidebar = document.getElementById('admin-sidebar');
        const overlay = document.getElementById('admin-overlay');
        const main = document.getElementById('admin-main');
        const sidebarToggle = document.getElementById('admin-sidebar-toggle');
        const body = document.getElementById('admin-body');

        const closeMenu = () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        };

        const openMenu = () => {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        };

        if (btn && sidebar && overlay) {
            btn.addEventListener('click', () => {
                if (sidebar.classList.contains('-translate-x-full')) {
                    openMenu();
                } else {
                    closeMenu();
                }
            });

            overlay.addEventListener('click', closeMenu);
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 1024) {
                    overlay.classList.add('hidden');
                    sidebar.classList.remove('-translate-x-full');
                } else if (sidebar.classList.contains('-translate-x-full')) {
                    overlay.classList.add('hidden');
                }
            });
        }
    </script>
    <script>
        if (sidebarToggle && sidebar && main && body) {
            sidebarToggle.addEventListener('click', () => {
                body.classList.toggle('sidebar-collapsed');
            });
        }
    </script>
    <script>
        const profileBtn = document.getElementById('admin-profile-btn');
        const profileMenu = document.getElementById('admin-profile-menu');

        if (profileBtn && profileMenu) {
            profileBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                profileMenu.classList.toggle('hidden');
            });
            document.addEventListener('click', () => {
                profileMenu.classList.add('hidden');
            });
        }
    </script>
    <script>
        document.querySelectorAll('[data-submenu-toggle]').forEach((btn) => {
            btn.addEventListener('click', () => {
                const key = btn.getAttribute('data-submenu-toggle');
                const menu = document.querySelector(`[data-submenu=\"${key}\"]`);
                const icon = document.querySelector(`[data-submenu-icon=\"${key}\"]`);
                if (!menu) return;
                menu.classList.toggle('hidden');
                if (icon) {
                    icon.classList.toggle('rotate-180');
                }
            });
        });
    </script>
    @if (!$isDrawer)
    <script>
        const drawer = document.getElementById('admin-drawer');
        const drawerOverlay = document.getElementById('admin-drawer-overlay');
        const drawerFrame = document.getElementById('admin-drawer-frame');
        const drawerTitle = document.getElementById('admin-drawer-title');
        const drawerClose = document.getElementById('admin-drawer-close');

        const openDrawer = (url, title) => {
            drawerTitle.textContent = title || 'Form';
            drawerFrame.src = url;
            drawer.classList.remove('translate-x-full');
            drawerOverlay.classList.remove('hidden');
        };

        const closeDrawer = () => {
            drawer.classList.add('translate-x-full');
            drawerOverlay.classList.add('hidden');
            drawerFrame.src = 'about:blank';
        };

        if (drawerOverlay) {
            drawerOverlay.addEventListener('click', closeDrawer);
        }
        if (drawerClose) {
            drawerClose.addEventListener('click', closeDrawer);
        }

        document.addEventListener('click', (e) => {
            const trigger = e.target.closest('[data-drawer-url]');
            if (!trigger) return;
            e.preventDefault();
            const url = trigger.getAttribute('data-drawer-url');
            const title = trigger.getAttribute('data-drawer-title');
            if (!url) return;
            openDrawer(url, title);
        });

        window.addEventListener('message', (event) => {
            if (!event?.data || event.data.type !== 'drawer:success') return;
            closeDrawer();
            window.location.reload();
        });
    </script>
    @else
    <script>
        if (window.parent) {
            const hasSuccess = {{ session('success') ? 'true' : 'false' }};
            if (hasSuccess) {
                window.parent.postMessage({ type: 'drawer:success' }, '*');
            }
        }
    </script>
    @endif
</body>
</html>
