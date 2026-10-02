import React from 'react';

export default function Logo({ className = '', variant = 'dark' }: { className?: string; variant?: 'dark' | 'light' }) {
    const textColor1 = variant === 'dark' ? 'text-ink-900' : 'text-white';
    const textColor2 = variant === 'dark' ? 'text-brand-900' : 'text-brand-100';

    return (
        <div className={`flex items-center gap-3 ${className}`}>
            <img src="/logo.png" alt="Logo SMA IT Soeman HS" className="h-12 w-auto object-contain" />
            <div className="flex flex-col">
                <span className={`font-heading font-bold leading-tight ${textColor1}`}>SMA IT</span>
                <span className={`font-heading font-bold leading-tight ${textColor2}`}>Soeman HS</span>
            </div>
        </div>
    );
}
