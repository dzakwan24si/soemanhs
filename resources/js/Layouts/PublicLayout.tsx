import React, { PropsWithChildren, useState } from 'react';
import { Link, usePage } from '@inertiajs/react';
import Logo from '../Components/Logo';
import Button from '../Components/Button';

export default function PublicLayout({ children }: PropsWithChildren) {
    const { props } = usePage();
    const settings = (props.settings as Record<string, string>) || {};
    const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);

    const navLinks = [
        { name: 'Beranda', href: '/' },
        { name: 'Profil', href: '#' },
        { name: 'Akademik', href: '#' },
        { name: 'Kesiswaan', href: '#' },
        { name: 'Informasi', href: '#' },
        { name: 'Kontak', href: '#' },
    ];

    return (
        <div className="min-h-screen flex flex-col font-sans text-ink-900 bg-cream-50">
            {/* Floating Navbar Pill */}
            <header className="fixed top-6 left-0 right-0 z-50 px-4 sm:px-6 lg:px-8">
                <div className="max-w-7xl mx-auto">
                    <div className="bg-white/95 backdrop-blur-md shadow-lg rounded-full px-6 flex justify-between items-center h-20 border border-gray-100">
                        <div className="flex-shrink-0 flex items-center">
                            <Link href="/">
                                <Logo />
                            </Link>
                        </div>
                        
                        {/* Desktop Menu */}
                        <nav className="hidden lg:flex space-x-8">
                            {navLinks.map((link) => (
                                <Link
                                    key={link.name}
                                    href={link.href}
                                    className="text-ink-500 hover:text-brand-600 font-medium transition-colors uppercase font-heading tracking-wide text-sm"
                                >
                                    {link.name}
                                </Link>
                            ))}
                        </nav>

                        <div className="hidden lg:flex items-center space-x-4">
                            <Button variant="cta" className="rounded-full px-6">Daftar PPDB</Button>
                        </div>

                        {/* Mobile menu button */}
                        <div className="flex items-center lg:hidden">
                            <button
                                onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
                                className="text-ink-500 hover:text-brand-900 focus:outline-none p-2"
                            >
                                <svg className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    {isMobileMenuOpen ? (
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
                                    ) : (
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M4 6h16M4 12h16M4 18h16" />
                                    )}
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                {/* Mobile Menu Drawer */}
                {isMobileMenuOpen && (
                    <div className="lg:hidden absolute top-20 left-0 w-full bg-white shadow-lg border-b border-gray-100 z-40">
                        <div className="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                            {navLinks.map((link) => (
                                <Link
                                    key={link.name}
                                    href={link.href}
                                    className="block px-3 py-2 rounded-md text-base font-medium text-ink-900 hover:bg-brand-50 hover:text-brand-600"
                                >
                                    {link.name}
                                </Link>
                            ))}
                            <div className="pt-4 pb-2 px-3">
                                <Button variant="cta" className="w-full">Daftar PPDB</Button>
                            </div>
                        </div>
                    </div>
                )}
            </header>

            {/* Main Content */}
            <main className="flex-grow">
                {children}
            </main>

            {/* Footer */}
            <footer className="bg-brand-900 text-white pt-16 pb-8">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                        <div className="col-span-1 md:col-span-2">
                            <Logo variant="light" className="mb-6" />
                            <p className="text-brand-100 max-w-sm mb-6">
                                {settings.footer_description || '[DESKRIPSI FOOTER SEKOLAH]'}
                            </p>
                        </div>
                        <div>
                            <h3 className="text-lg font-heading font-bold mb-4">Tautan Cepat</h3>
                            <ul className="space-y-3">
                                {['Tentang Kami', 'Program Unggulan', 'Berita Terbaru', 'Informasi PPDB'].map(item => (
                                    <li key={item}>
                                        <Link href="#" className="text-brand-100 hover:text-white transition-colors">{item}</Link>
                                    </li>
                                ))}
                            </ul>
                        </div>
                        <div>
                            <h3 className="text-lg font-heading font-bold mb-4">Hubungi Kami</h3>
                            <ul className="space-y-3 text-brand-100">
                                <li>{settings.address || '[ALAMAT]'}</li>
                                <li>{settings.phone || '[TELEPON]'}</li>
                                <li>{settings.email || '[EMAIL]'}</li>
                            </ul>
                        </div>
                    </div>
                    <div className="border-t border-brand-700 pt-8 flex flex-col md:flex-row justify-between items-center">
                        <p className="text-brand-100 text-sm">
                            &copy; {new Date().getFullYear()} SMA IT Soeman HS. Hak cipta dilindungi undang-undang.
                        </p>
                        <div className="flex space-x-4 mt-4 md:mt-0">
                            {/* Social Media placeholders */}
                            <a href="#" className="text-brand-100 hover:text-white">IG</a>
                            <a href="#" className="text-brand-100 hover:text-white">FB</a>
                            <a href="#" className="text-brand-100 hover:text-white">YT</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    );
}
