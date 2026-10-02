import React from 'react';

interface ImageCardProps {
    title: string;
    description?: string;
    className?: string;
    imagePlaceholder?: React.ReactNode;
}

export default function ImageCard({ title, description, className = '', imagePlaceholder }: ImageCardProps) {
    return (
        <div className={`group relative overflow-hidden rounded-2xl bg-brand-700 aspect-[3/4] ${className}`}>
            {/* Image Placeholder */}
            <div className="absolute inset-0 flex items-center justify-center text-brand-100 transition-transform duration-700 group-hover:scale-105">
                {imagePlaceholder || <span>[FOTO]</span>}
            </div>
            
            {/* Gradient Overlay */}
            <div className="absolute inset-0 bg-gradient-to-t from-brand-900/90 via-brand-900/40 to-transparent"></div>
            
            {/* Content */}
            <div className="absolute bottom-0 left-0 right-0 p-6 z-10 text-left">
                <div className="w-10 h-1 bg-gold-500 mb-4 transform origin-left transition-transform duration-300 group-hover:scale-x-150"></div>
                <h3 className="text-2xl font-heading font-bold text-white mb-2 leading-tight">
                    {title}
                </h3>
                {description && (
                    <p className="text-brand-100 text-sm opacity-0 transform translate-y-4 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
                        {description}
                    </p>
                )}
            </div>
        </div>
    );
}
