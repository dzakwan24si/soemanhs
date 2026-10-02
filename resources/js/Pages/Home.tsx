import React from 'react';
import { Head, usePage } from '@inertiajs/react';
import PublicLayout from '../Layouts/PublicLayout';
import SectionHeading from '../Components/SectionHeading';
import Button from '../Components/Button';
import StarPattern from '../Components/StarPattern';
import ArchFrame from '../Components/ArchFrame';
import ImageCard from '../Components/ImageCard';
import QuickLinkCard from '../Components/QuickLinkCard';
import GoldTape from '../Components/GoldTape';
import CalendarWidget from '../Components/CalendarWidget';
import Stepper from '../Components/Stepper';

export default function Home() {
    const { props } = usePage();
    const settings = (props.settings as Record<string, string>) || {};

    const testimonials = []; // Dummy empty array for now

    return (
        <PublicLayout>
            <Head title="Beranda" />
            
            {/* 2. Hero Section */}
            <section className="relative px-4 sm:px-6 lg:px-8 pt-4 pb-20 lg:pb-32 max-w-[1440px] mx-auto">
                <div 
                    className="bg-brand-900 rounded-[3rem] overflow-hidden relative shadow-2xl min-h-[85vh] lg:min-h-[90vh] flex items-center pt-24 lg:pt-32 group"
                    style={{
                        backgroundImage: settings.hero_image ? `url(${settings.hero_image})` : undefined,
                        backgroundSize: 'cover',
                        backgroundPosition: 'center',
                    }}
                >
                    {/* Placeholder for Full Hero Background Photo if no image */}
                    {!settings.hero_image && (
                        <div className="absolute inset-0 bg-gradient-to-br from-brand-900 to-brand-700">
                            <StarPattern className="absolute inset-0 w-full h-full opacity-10 text-brand-100 mix-blend-overlay" />
                        </div>
                    )}
                    
                    {/* Dark gradient overlay to ensure text readability over the background image */}
                    <div className="absolute inset-0 bg-gradient-to-r from-brand-900/95 via-brand-900/70 to-brand-900/30 z-0 mix-blend-multiply"></div>
                    <div className="absolute inset-0 bg-gradient-to-r from-brand-900/80 to-transparent z-0"></div>
                    
                    <div className="relative z-10 w-full p-8 lg:p-16">
                        <div className="max-w-3xl text-white">
                            <h1 className="text-5xl lg:text-7xl font-heading font-bold leading-[1.1] mb-6 uppercase">
                                {settings.tagline || '[TAGLINE SEKOLAH]'}
                            </h1>
                            <p className="text-xl text-brand-100 mb-10 leading-relaxed font-light max-w-lg">
                                [DESKRIPSI SINGKAT SEKOLAH UNTUK HERO SECTION]
                            </p>
                            <div className="flex flex-col sm:flex-row gap-4">
                                <Button variant="cta" className="text-lg px-8 py-4 rounded-full uppercase tracking-wider font-bold shadow-lg shadow-accent-500/30">
                                    Daftar PPDB Sekarang
                                </Button>
                                <Button className="text-lg px-8 py-4 rounded-full bg-white/10 hover:bg-white text-white hover:text-brand-900 backdrop-blur-sm border border-white/20 uppercase tracking-wider font-bold transition-all">
                                    Profil Sekolah
                                </Button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {/* 3. Sambutan */}
            <section className="py-20 bg-cream-50 overflow-hidden">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                        <div>
                            <span className="text-brand-600 font-bold tracking-widest uppercase text-sm mb-2 block">Ahlan Wa Sahlan</span>
                            <SectionHeading 
                                title="[JUDUL SAMBUTAN]" 
                                subtitle="[SUBJUDUL SAMBUTAN KEPALA SEKOLAH]"
                            />
                            <div className="prose prose-lg text-ink-500">
                                <p>[PARAGRAF SAMBUTAN 1]</p>
                                <p>[PARAGRAF SAMBUTAN 2]</p>
                            </div>
                            <div className="mt-8">
                                <p className="font-heading font-bold text-xl text-brand-900">[NAMA KEPALA SEKOLAH]</p>
                                <p className="text-ink-500">Kepala SMA IT Soeman HS</p>
                            </div>
                        </div>
                        <div className="relative h-[600px] w-full max-w-md mx-auto lg:ml-auto">
                            <ArchFrame className="h-full">
                                <div className="absolute inset-0 flex items-center justify-center bg-gray-200 text-ink-500">
                                    <span className="font-heading uppercase tracking-widest">[FOTO KEPALA SEKOLAH]</span>
                                </div>
                            </ArchFrame>
                        </div>
                    </div>
                </div>
            </section>

            {/* 4. Mengapa Memilih Kami */}
            <section className="py-24 bg-brand-900 relative">
                <StarPattern className="absolute inset-0 w-full h-full opacity-10 text-brand-100" />
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                    <div className="text-center mb-16">
                        <h2 className="text-4xl md:text-5xl font-heading font-bold text-white mb-4 uppercase">Mengapa Memilih Kami?</h2>
                        <div className="h-1 w-24 bg-gold-500 mx-auto rounded-full"></div>
                    </div>
                    
                    <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        {[1, 2, 3, 4].map((i) => {
                            const icons = [
                                <path key="1" strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />,
                                <path key="2" strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />,
                                <path key="3" strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />,
                                <path key="4" strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            ];
                            return (
                                <ImageCard 
                                    key={i}
                                    title={`[KEUNGGULAN ${i}]`}
                                    description={`[DESKRIPSI SINGKAT KEUNGGULAN ${i}]`}
                                    className="border border-gold-500/20"
                                    imagePlaceholder={
                                        <div className="flex flex-col items-center">
                                            <svg className="w-12 h-12 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                {icons[i-1]}
                                            </svg>
                                            <span className="text-sm font-bold uppercase tracking-wider">[FOTO]</span>
                                        </div>
                                    }
                                />
                            );
                        })}
                    </div>
                </div>
            </section>

            {/* 5. Tautan Cepat */}
            <section className="py-20 bg-white">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <QuickLinkCard 
                            title="Informasi PPDB" 
                            description="Pendaftaran peserta didik baru dan informasi biaya."
                            href="#"
                            highlighted
                            icon={
                                <svg className="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                </svg>
                            }
                        />
                        <QuickLinkCard 
                            title="Kalender Akademik" 
                            description="Jadwal kegiatan belajar mengajar dan hari libur."
                            href="#"
                            icon={
                                <svg className="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            }
                        />
                        <QuickLinkCard 
                            title="Berita & Pengumuman" 
                            description="Update terbaru seputar kegiatan dan prestasi sekolah."
                            href="#"
                            icon={
                                <svg className="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15" />
                                </svg>
                            }
                        />
                        <QuickLinkCard 
                            title="Hubungi Kami" 
                            description="Layanan informasi dan lokasi gedung sekolah."
                            href="#"
                            icon={
                                <svg className="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            }
                        />
                    </div>
                </div>
            </section>

            {/* 6. Pita Emas Diagonal (wrapped in overflow clip to prevent horizontal scroll) */}
            <div className="w-full overflow-hidden">
                <GoldTape text={settings.tagline || "[TAGLINE SEKOLAH]"} />
            </div>

            {/* 7. Program (Stepper) */}
            <section className="py-24 bg-cream-50">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <SectionHeading 
                        title="Program Pendidikan" 
                        subtitle="Kurikulum yang berkesinambungan membentuk karakter dan kemampuan akademis."
                        centered
                    />
                    
                    <div className="mt-16">
                        <Stepper 
                            items={[
                                {
                                    id: 'x',
                                    title: 'Kelas X',
                                    subtitle: 'Tahap Kelas X',
                                    description: '[TAHAP KELAS X]',
                                    imagePlaceholder: <div className="text-center font-bold uppercase tracking-widest">[FOTO KELAS X]</div>
                                },
                                {
                                    id: 'xi',
                                    title: 'Kelas XI',
                                    subtitle: 'Tahap Kelas XI',
                                    description: '[TAHAP KELAS XI]',
                                    imagePlaceholder: <div className="text-center font-bold uppercase tracking-widest">[FOTO KELAS XI]</div>
                                },
                                {
                                    id: 'xii',
                                    title: 'Kelas XII',
                                    subtitle: 'Tahap Kelas XII',
                                    description: '[TAHAP KELAS XII]',
                                    imagePlaceholder: <div className="text-center font-bold uppercase tracking-widest">[FOTO KELAS XII]</div>
                                }
                            ]}
                        />
                    </div>
                </div>
            </section>

            {/* 8. Kalender Akademik */}
            <section className="py-24 bg-white">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <CalendarWidget />
                </div>
            </section>

            {/* 9. Berita Terbaru */}
            <section className="py-24 bg-cream-50">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="flex justify-between items-end mb-12">
                        <SectionHeading title="Berita & Artikel" />
                        <Button variant="outline-brand" className="hidden sm:inline-flex mb-10">Lihat Semua Berita</Button>
                    </div>
                    
                    <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
                        {[1, 2, 3].map(i => (
                            <div key={i} className="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 group">
                                <div className="h-48 bg-gray-200 relative overflow-hidden flex items-center justify-center text-ink-500">
                                    <span className="font-heading uppercase font-bold tracking-widest">[FOTO BERITA {i}]</span>
                                </div>
                                <div className="p-6">
                                    <div className="text-xs font-bold text-brand-600 mb-2 uppercase tracking-wider">Kategori</div>
                                    <h3 className="text-xl font-heading font-bold text-ink-900 mb-3 group-hover:text-brand-600 transition-colors">
                                        [JUDUL BERITA {i}]
                                    </h3>
                                    <p className="text-ink-500 text-sm mb-4 line-clamp-2">
                                        [CUPLIKAN BERITA {i}]
                                    </p>
                                    <div className="text-xs text-gray-400">12 Agustus 2026</div>
                                </div>
                            </div>
                        ))}
                    </div>
                    <Button variant="outline-brand" className="w-full mt-8 sm:hidden">Lihat Semua Berita</Button>
                </div>
            </section>

            {/* 10. Testimoni (Opsional) */}
            {testimonials.length > 0 && (
                <section className="py-24 bg-white">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                        <SectionHeading title="Kata Mereka" centered />
                        {/* Carousel placeholder */}
                    </div>
                </section>
            )}

            {/* 11. Banner CTA PPDB */}
            <section className="py-24 relative overflow-hidden">
                {/* Background composed of photos (placeholder) */}
                <div className="absolute inset-0 bg-brand-900 flex items-center justify-center">
                    <div className="w-full h-full flex gap-4 opacity-20 p-8 filter blur-[2px]">
                        <div className="w-1/3 h-[120%] bg-gray-300 rounded-t-[100px] transform -translate-y-12 flex items-center justify-center"><span className="text-4xl">[FOTO]</span></div>
                        <div className="w-1/3 h-[140%] bg-gray-400 rounded-t-[150px] transform -translate-y-24 flex items-center justify-center"><span className="text-4xl">[FOTO]</span></div>
                        <div className="w-1/3 h-[120%] bg-gray-300 rounded-t-[100px] transform -translate-y-12 flex items-center justify-center"><span className="text-4xl">[FOTO]</span></div>
                    </div>
                </div>
                {/* Dark overlay */}
                <div className="absolute inset-0 bg-brand-900/80"></div>
                
                <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center text-white">
                    <h2 className="text-4xl md:text-6xl font-heading font-bold mb-6 uppercase">
                        [AJAKAN MENDAFTAR PPDB]
                    </h2>
                    <p className="text-xl text-brand-100 mb-10">
                        [DESKRIPSI AJAKAN MENDAFTAR]
                    </p>
                    <Button variant="cta" className="text-xl px-12 py-5 rounded-full uppercase tracking-widest shadow-xl shadow-accent-500/40">
                        Daftar Sekarang
                    </Button>
                </div>
            </section>
        </PublicLayout>
    );
}
