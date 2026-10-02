import React from 'react';

interface GoldTapeProps {
    text: string;
}

export default function GoldTape({ text }: GoldTapeProps) {
    // Array to duplicate content for smooth scrolling
    const items = Array.from({ length: 6 });

    return (
        <div className="w-full bg-gold-500 py-4 overflow-hidden relative border-y border-gold-600/20 transform -rotate-2 scale-105 my-12">
            <div className="flex whitespace-nowrap motion-safe:animate-marquee">
                {items.map((_, i) => (
                    <div key={i} className="flex items-center mx-4">
                        <span className="text-brand-900 font-heading font-bold text-2xl uppercase tracking-wider px-6">
                            {text}
                        </span>
                        {/* 8-point star (Rub el Hizb inspired) */}
                        <svg className="w-6 h-6 text-brand-900" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 0l2.5 8.5L23 12l-8.5 2.5L12 24l-2.5-8.5L1 12l8.5-2.5L12 0zm0 4.5l-1.5 5.5-5.5 1.5 5.5 1.5 1.5 5.5 1.5-5.5 5.5-1.5-5.5-1.5-1.5-5.5z" />
                        </svg>
                    </div>
                ))}
                {/* Duplicated set for seamless loop */}
                {items.map((_, i) => (
                    <div key={`dup-${i}`} className="flex items-center mx-4">
                        <span className="text-brand-900 font-heading font-bold text-2xl uppercase tracking-wider px-6">
                            {text}
                        </span>
                        <svg className="w-6 h-6 text-brand-900" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 0l2.5 8.5L23 12l-8.5 2.5L12 24l-2.5-8.5L1 12l8.5-2.5L12 0zm0 4.5l-1.5 5.5-5.5 1.5 5.5 1.5 1.5 5.5 1.5-5.5 5.5-1.5-5.5-1.5-1.5-5.5z" />
                        </svg>
                    </div>
                ))}
            </div>
        </div>
    );
}
