import React from 'react';

interface ArchFrameProps {
    children: React.ReactNode;
    className?: string;
    showGoldLine?: boolean;
}

export default function ArchFrame({ children, className = '', showGoldLine = true }: ArchFrameProps) {
    return (
        <div className={`relative ${className}`}>
            {/* The Arch shape */}
            <div 
                className="overflow-hidden bg-brand-100 relative z-10 h-full w-full shadow-soft"
                style={{ borderRadius: '150px 150px 12px 12px' }}
            >
                {children}
            </div>
            
            {/* Decorative gold offset frame */}
            {showGoldLine && (
                <div 
                    className="absolute inset-0 border-2 border-gold-500 z-0 transform translate-x-4 translate-y-4"
                    style={{ borderRadius: '150px 150px 12px 12px' }}
                />
            )}
        </div>
    );
}
