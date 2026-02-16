<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Arsitektur Laravel yang Rapi untuk Tim Kecil',
                'slug' => 'arsitektur-laravel-yang-rapi',
                'excerpt' => 'Pola struktur folder, service layer, dan konvensi yang bikin project tetap sehat walau timnya kecil.',
                'intro' => 'Struktur yang konsisten membuat tim kecil bisa bergerak cepat tanpa utang teknis menumpuk. Kuncinya adalah pemisahan layer yang jelas, aturan naming yang stabil, dan kebiasaan review yang ringan namun efektif.',
                'category' => 'engineering',
                'read_time' => '6 min read',
                'author' => 'Rafi Pratama',
                'image' => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1400&q=80',
                'published_at' => Carbon::now()->subDays(35),
                'sections' => [
                    [
                        'title' => 'Pemisahan Layer yang Sederhana',
                        'text' => 'Gunakan pembagian yang mudah dipahami: Controller untuk orchestrasi, Service untuk bisnis, dan Repository untuk data. Hindari menaruh query kompleks langsung di Controller agar perubahan tetap terlokalisasi dan mudah dites.',
                    ],
                    [
                        'title' => 'Konvensi yang Disepakati Bersama',
                        'text' => 'Tetapkan aturan penamaan untuk action, DTO, request, dan response. Dengan konvensi ini, anggota baru bisa memahami struktur project tanpa onboarding panjang.',
                    ],
                    [
                        'title' => 'Testing yang Fokus pada Risiko',
                        'text' => 'Prioritaskan test pada alur pembayaran, integrasi pihak ketiga, dan logic yang paling sering berubah. Gunakan test kecil dan cepat agar pipeline tetap ringan.',
                    ],
                ],
                'content' => null,
                'tags' => ['Architecture', 'Laravel', 'Team'],
            ],
            [
                'title' => 'Membangun Design System Ringan untuk Produk SaaS',
                'slug' => 'design-system-produk-saas',
                'excerpt' => 'Bagaimana menjaga konsistensi UI tanpa memperlambat proses delivery dan eksperimen.',
                'intro' => 'Design system tidak harus besar. Yang penting adalah konsistensi visual, aturan komponen yang jelas, dan dokumentasi singkat yang mudah diakses tim.',
                'category' => 'design',
                'read_time' => '7 min read',
                'author' => 'Nadia Putri',
                'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1400&q=80',
                'published_at' => Carbon::now()->subDays(50),
                'sections' => [
                    [
                        'title' => 'Mulai dari Fondasi',
                        'text' => 'Definisikan warna, tipografi, dan spacing scale lebih dulu. Setelah itu, buat komponen inti seperti button, input, dan card agar tim punya dasar yang konsisten.',
                    ],
                    [
                        'title' => 'Komponen yang Mudah Digunakan',
                        'text' => 'Pastikan setiap komponen memiliki variasi yang jelas dan contoh penggunaan. Hindari variasi tanpa kebutuhan yang nyata karena akan memperberat maintenance.',
                    ],
                    [
                        'title' => 'Dokumentasi Ringan',
                        'text' => 'Cukup dengan halaman internal yang memuat aturan dan contoh. Dokumentasi singkat lebih sering dibaca dan lebih mudah diperbarui.',
                    ],
                ],
                'content' => null,
                'tags' => ['Design System', 'UX', 'Product'],
            ],
            [
                'title' => 'Kinerja API di Skala Tinggi: Praktik yang Terbukti',
                'slug' => 'kinerja-api-di-skala-tinggi',
                'excerpt' => 'Strategi caching, query planning, dan observability yang sering kami pakai di production.',
                'intro' => 'Kinerja API tidak hanya soal latency, tapi juga stabilitas. Mulai dari caching yang tepat, indeks database yang terukur, hingga observability yang matang.',
                'category' => 'performance',
                'read_time' => '8 min read',
                'author' => 'Dion Wicak',
                'image' => 'https://images.unsplash.com/photo-1555949963-aa79dcee981d?auto=format&fit=crop&w=1400&q=80',
                'published_at' => Carbon::now()->subDays(62),
                'sections' => [
                    [
                        'title' => 'Cache yang Tepat Sasaran',
                        'text' => 'Cache response yang stabil dan berulang, terutama untuk data referensi. Gunakan TTL yang realistis dan invalidasi berbasis event jika memungkinkan.',
                    ],
                    [
                        'title' => 'Query Planning',
                        'text' => 'Pantau query dengan EXPLAIN dan perhatikan indexing. Hindari N+1 dan pastikan eager loading sesuai kebutuhan halaman.',
                    ],
                    [
                        'title' => 'Observability Sejak Awal',
                        'text' => 'Logging, metric, dan tracing membantu tim memahami bottleneck sebelum berdampak ke user. Fokus pada request yang paling sering dipakai.',
                    ],
                ],
                'content' => null,
                'tags' => ['Performance', 'Observability', 'API'],
            ],
            [
                'title' => 'Workflow DevOps yang Sederhana tapi Kuat',
                'slug' => 'workflow-devops-yang-sederhana',
                'excerpt' => 'Pipeline minimalis yang fokus ke reliability: build, test, deploy, dan rollback cepat.',
                'intro' => 'Pipeline yang baik tidak harus rumit. Yang penting adalah konsistensi build, test yang relevan, dan strategi rollback yang jelas.',
                'category' => 'ops',
                'read_time' => '5 min read',
                'author' => 'Salsa Anindya',
                'image' => 'https://images.unsplash.com/photo-1527443154391-507e9dc6c5cc?auto=format&fit=crop&w=1400&q=80',
                'published_at' => Carbon::now()->subDays(88),
                'sections' => [
                    [
                        'title' => 'Build Sekali',
                        'text' => 'Bangun artifact sekali dan gunakan untuk semua environment. Ini mencegah perbedaan konfigurasi yang sering menyebabkan bug di production.',
                    ],
                    [
                        'title' => 'Test yang Punya Impact',
                        'text' => 'Fokus pada test critical path: login, pembayaran, dan integrasi utama. Test yang terlalu banyak tapi tidak relevan justru menghambat delivery.',
                    ],
                    [
                        'title' => 'Rollback yang Jelas',
                        'text' => 'Siapkan strategi rollback dan runbook. Ini mengurangi stress saat incident dan mempercepat recovery.',
                    ],
                ],
                'content' => null,
                'tags' => ['DevOps', 'CI/CD', 'Reliability'],
            ],
            [
                'title' => 'Audit UX dalam 30 Menit untuk Produk B2B',
                'slug' => 'audit-ux-dalam-30-menit',
                'excerpt' => 'Checklist ringkas untuk menemukan friction terbesar yang menghambat activation.',
                'intro' => 'Audit cepat membantu tim menemukan friction terbesar sebelum sesi riset panjang. Fokus pada activation, onboarding, dan feedback loop.',
                'category' => 'product',
                'read_time' => '6 min read',
                'author' => 'Raka Jatmiko',
                'image' => 'https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=1400&q=80',
                'published_at' => Carbon::now()->subDays(104),
                'sections' => [
                    [
                        'title' => 'Cek Waktu Aktivasi',
                        'text' => 'Hitung langkah yang dibutuhkan user untuk mencapai nilai pertama. Semakin singkat, semakin besar peluang aktivasi.',
                    ],
                    [
                        'title' => 'Onboarding yang Ringkas',
                        'text' => 'Ganti tutorial panjang dengan checklist progres. User merasa lebih cepat mencapai tujuan.',
                    ],
                    [
                        'title' => 'Feedback Loop',
                        'text' => 'Pastikan ada feedback langsung ketika user menyelesaikan aksi penting. Ini menjaga momentum dan retensi.',
                    ],
                ],
                'content' => null,
                'tags' => ['Product', 'UX', 'Activation'],
            ],
            [
                'title' => 'Sistem Logging yang Terukur dan Mudah Dioperasikan',
                'slug' => 'sistem-logging-yang-terukur',
                'excerpt' => 'Definisi event, struktur log, dan cara menjaga biaya observability tetap terkendali.',
                'intro' => 'Logging yang baik adalah fondasi observability. Tanpa struktur yang jelas, biaya akan naik dan debugging jadi lambat.',
                'category' => 'infrastructure',
                'read_time' => '9 min read',
                'author' => 'Alya Dewi',
                'image' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1400&q=80',
                'published_at' => Carbon::now()->subDays(128),
                'sections' => [
                    [
                        'title' => 'Standarisasi Event',
                        'text' => 'Definisikan struktur event dan field yang konsisten. Ini memudahkan filter dan analisis lintas layanan.',
                    ],
                    [
                        'title' => 'Level Logging yang Bijak',
                        'text' => 'Gunakan level info untuk alur normal, warn untuk anomali, dan error hanya untuk failure nyata. Ini menurunkan noise.',
                    ],
                    [
                        'title' => 'Biaya yang Terkendali',
                        'text' => 'Gunakan sampling untuk event yang sangat sering. Simpan full log hanya untuk periode investigasi.',
                    ],
                ],
                'content' => null,
                'tags' => ['Observability', 'Logging', 'Infrastructure'],
            ],
        ];

        foreach ($posts as $data) {
            $category = Category::where('slug', $data['category'])->firstOrFail();

            $post = Post::updateOrCreate(
                ['slug' => $data['slug']],
                [
                    'category_id' => $category->id,
                    'title' => $data['title'],
                    'excerpt' => $data['excerpt'],
                    'intro' => $data['intro'],
                    'sections' => $data['sections'],
                    'content' => $this->sectionsToMarkdown($data['sections'] ?? []),
                    'image' => $data['image'],
                    'author' => $data['author'],
                    'read_time' => $this->estimateReadTime($data['sections'] ?? [], $data['intro'] ?? '', $data['excerpt'] ?? ''),
                    'published_at' => $data['published_at'],
                ]
            );

            $tagIds = Tag::whereIn('name', $data['tags'])->pluck('id')->all();
            $post->tags()->sync($tagIds);
        }
    }

    private function sectionsToMarkdown(array $sections): string
    {
        $blocks = [];
        foreach ($sections as $section) {
            $title = trim((string) ($section['title'] ?? ''));
            $text = trim((string) ($section['text'] ?? ''));
            if ($title !== '') {
                $blocks[] = '## ' . $title;
            }
            if ($text !== '') {
                $blocks[] = $text;
            }
        }
        return implode("\n\n", $blocks);
    }

    private function estimateReadTime(array $sections, string $intro, string $excerpt): string
    {
        $content = $this->sectionsToMarkdown($sections);
        $source = trim($content . "\n\n" . $intro . "\n\n" . $excerpt);
        $words = 0;
        if ($source !== '') {
            preg_match_all('/\\p{L}+/u', $source, $matches);
            $words = count($matches[0] ?? []);
        }
        $minutes = max(1, (int) ceil($words / 200));
        return $minutes . ' min read';
    }
}
