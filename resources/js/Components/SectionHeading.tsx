import React from 'react';

interface Props {
    title: string;
    subtitle?: string;
    centered?: boolean;
}

export default function SectionHeading({ title, subtitle, centered = false }: Props) {
    return (
        <div className={`mb-10 ${centered ? 'text-center' : 'text-left'}`}>
            <h2 className="text-3xl md:text-4xl font-heading font-bold text-brand-900 mb-3 uppercase">{title}</h2>
            <div className={`h-1 w-16 bg-gold-500 rounded-full mb-4 ${centered ? 'mx-auto' : ''}`}></div>
            {subtitle && <p className={`text-ink-500 text-lg max-w-2xl ${centered ? 'mx-auto' : ''}`}>{subtitle}</p>}
        </div>
    );
}
