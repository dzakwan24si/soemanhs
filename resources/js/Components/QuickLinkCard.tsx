import React from 'react';
import { Link } from '@inertiajs/react';

interface QuickLinkCardProps {
    title: string;
    description: string;
    href: string;
    icon: React.ReactNode;
    highlighted?: boolean;
}

export default function QuickLinkCard({ title, description, href, icon, highlighted = false }: QuickLinkCardProps) {
    const baseClasses = "flex flex-col h-full p-6 rounded-2xl transition-transform hover:-translate-y-1 shadow-sm border";
    
    const colorClasses = highlighted 
        ? "bg-brand-600 text-white border-brand-500 hover:shadow-lg hover:shadow-brand-600/30" 
        : "bg-white text-ink-900 border-gray-100 hover:shadow-md hover:border-brand-100";
        
    const iconWrapperClasses = highlighted 
        ? "bg-white text-brand-600" 
        : "bg-brand-50 text-brand-600";
        
    const descClasses = highlighted ? "text-brand-100" : "text-ink-500";

    return (
        <Link href={href} className={`${baseClasses} ${colorClasses}`}>
            <div className={`w-12 h-12 rounded-xl flex items-center justify-center mb-6 ${iconWrapperClasses}`}>
                {icon}
            </div>
            <h3 className="text-xl font-heading font-bold mb-2 uppercase">{title}</h3>
            <p className={`text-sm flex-grow ${descClasses}`}>{description}</p>
            <div className="mt-6 flex justify-end">
                <div className={`w-8 h-8 rounded-full flex items-center justify-center ${highlighted ? 'bg-white/20' : 'bg-brand-50 text-brand-600'}`}>
                    <svg className="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </div>
            </div>
        </Link>
    );
}
