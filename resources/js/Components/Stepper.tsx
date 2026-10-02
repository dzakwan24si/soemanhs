import React, { useState } from 'react';

interface StepperItem {
    id: string;
    title: string;
    subtitle: string;
    description: string;
    imagePlaceholder: React.ReactNode;
}

interface StepperProps {
    items: StepperItem[];
}

export default function Stepper({ items }: StepperProps) {
    const [activeIndex, setActiveIndex] = useState(0);

    return (
        <div className="w-full">
            {/* Stepper Navigation */}
            <div className="flex flex-col md:flex-row justify-between relative mb-12">
                <div className="absolute top-1/2 left-0 right-0 h-0.5 bg-gray-200 -z-10 hidden md:block transform -translate-y-1/2"></div>
                {items.map((item, idx) => {
                    const isActive = idx === activeIndex;
                    const isPast = idx < activeIndex;
                    
                    return (
                        <button
                            key={item.id}
                            onClick={() => setActiveIndex(idx)}
                            className="flex flex-col items-center group relative bg-cream-50 md:px-4 py-4 md:py-0 w-full md:w-auto"
                        >
                            <div className={`w-12 h-12 rounded-full flex items-center justify-center font-heading font-bold text-lg mb-4 transition-colors ${
                                isActive 
                                    ? 'bg-brand-600 text-white shadow-md shadow-brand-600/30' 
                                    : isPast 
                                        ? 'bg-brand-100 text-brand-600' 
                                        : 'bg-white text-ink-500 border-2 border-gray-100 group-hover:border-brand-100 group-hover:text-brand-600'
                            }`}>
                                {idx + 1}
                            </div>
                            <h4 className={`font-heading font-bold uppercase tracking-wide transition-colors ${isActive ? 'text-brand-900' : 'text-ink-500 group-hover:text-brand-600'}`}>
                                {item.title}
                            </h4>
                            <p className="text-xs text-ink-500 mt-1 uppercase tracking-wider hidden md:block">{item.subtitle}</p>
                        </button>
                    );
                })}
            </div>

            {/* Stepper Content */}
            <div className="bg-white rounded-3xl shadow-soft border border-gray-100 overflow-hidden relative">
                <div 
                    className="flex transition-transform duration-500 ease-in-out" 
                    style={{ transform: `translateX(-${activeIndex * (100 / items.length)}%)`, width: `${items.length * 100}%` }}
                >
                    {items.map((item) => (
                        <div key={item.id} className="w-full flex-shrink-0 grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center p-6 md:p-12" style={{ width: `${100 / items.length}%` }}>
                            <div className="order-2 md:order-1">
                                <h3 className="text-3xl font-heading font-bold text-brand-900 mb-4 uppercase">
                                    {item.title} - {item.subtitle}
                                </h3>
                                <div className="w-12 h-1 bg-gold-500 mb-6"></div>
                                <p className="text-ink-500 leading-relaxed text-lg mb-8">
                                    {item.description}
                                </p>
                                <button className="text-brand-600 font-semibold hover:text-brand-700 flex items-center gap-2 group">
                                    Lihat Kurikulum Lengkap
                                    <svg className="w-5 h-5 transform transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </button>
                            </div>
                            <div className="order-1 md:order-2">
                                <div className="aspect-video bg-brand-50 rounded-2xl flex items-center justify-center text-brand-600 shadow-inner border border-brand-100 overflow-hidden relative group">
                                    <div className="absolute inset-0 bg-gradient-to-tr from-brand-100/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                    <div className="transform transition-transform duration-500 group-hover:scale-110">
                                        {item.imagePlaceholder}
                                    </div>
                                </div>
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </div>
    );
}
