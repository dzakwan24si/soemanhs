import React from 'react';
import { Head, Link } from '@inertiajs/react';

export default function Index({ posts }) {
    return (
        <div className="min-h-screen bg-gray-50 font-sans text-gray-800">
            <Head title="Berita & Pengumuman" />

            <header className="bg-blue-900 py-16 text-center text-white">
                <h1 className="text-4xl font-bold tracking-tight">Kabar Terbaru</h1>
                <p className="mt-4 text-gray-200">
                    Informasi, berita, dan pengumuman resmi dari SMA IT Soeman HS.
                </p>
            </header>

            <main className="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
                {posts.length === 0 ? (
                    <div className="text-center text-gray-500 py-20">
                        Belum ada berita yang dipublikasikan.
                    </div>
                ) : (
                    <div className="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                        {posts.map((post) => (
                            <article
                                key={post.id}
                                className="flex flex-col overflow-hidden rounded-xl bg-white shadow-sm border border-gray-100 transition-all hover:shadow-md"
                            >
                                <div className="h-48 w-full bg-gray-200">
                                    {post.image && (
                                        <img src={`/storage/${post.image}`} alt={post.title} className="h-full w-full object-cover" />
                                    )}
                                </div>
                                <div className="flex flex-1 flex-col justify-between p-6">
                                    <div>
                                        <p className="text-xs font-medium text-gray-500 mb-2">
                                            {new Date(post.created_at).toLocaleDateString('id-ID', { year: 'numeric', month: 'long', day: 'numeric' })}
                                        </p>
                                        <h2 className="mb-3 text-xl font-semibold text-gray-900">
                                            {post.title}
                                        </h2>
                                        <p className="text-sm text-gray-600 line-clamp-3">
                                            {post.content}
                                        </p>
                                    </div>
                                    <div className="mt-6">
                                        {/* Gunakan komponen Link dari Inertia agar pindah halaman tanpa reload */}
                                        <Link
                                            href={`/berita/${post.slug}`}
                                            className="text-sm font-semibold text-blue-900 hover:text-blue-700 hover:underline"
                                        >
                                            Baca selengkapnya &rarr;
                                        </Link>
                                    </div>
                                </div>
                            </article>
                        ))}
                    </div>
                )}
            </main>
        </div>
    );
}