import React from 'react';
import { Head } from '@inertiajs/react';

export default function Index({ facilities }) {
    return (
        <div className="min-h-screen bg-gray-50 font-sans text-gray-800">
            <Head title="Fasilitas Sekolah" />

            {/* Header Section */}
            <header className="bg-blue-900 py-16 text-center text-white">
                <h1 className="text-4xl font-bold tracking-tight">Fasilitas Sekolah</h1>
                <p className="mt-4 text-gray-200">
                    Lingkungan belajar yang nyaman dan memadai di SMA IT Soeman HS.
                </p>
            </header>

            {/* Content Section */}
            <main className="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
                {facilities.length === 0 ? (
                    <div className="text-center text-gray-500 py-20">
                        Belum ada data fasilitas yang ditambahkan.
                    </div>
                ) : (
                    <div className="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                        {facilities.map((facility) => (
                            <div
                                key={facility.id}
                                className="group overflow-hidden rounded-xl bg-white shadow-sm border border-gray-100 transition-all hover:shadow-md"
                            >
                                {/* Placeholder Gambar (Warna Abu-abu) */}
                                <div className="h-48 w-full bg-gray-200 object-cover flex items-center justify-center text-gray-400">
                                    {facility.image ? (
                                        <img src={`/storage/${facility.image}`} alt={facility.name} className="h-full w-full object-cover" />
                                    ) : (
                                        <span>Tidak ada foto</span>
                                    )}
                                </div>

                                <div className="p-6">
                                    <h2 className="mb-3 text-xl font-semibold text-blue-900 group-hover:text-blue-700 transition-colors">
                                        {facility.name}
                                    </h2>
                                    <p className="text-gray-600 leading-relaxed text-sm">
                                        {facility.description}
                                    </p>
                                </div>
                            </div>
                        ))}
                    </div>
                )}
            </main>
        </div>
    );
}