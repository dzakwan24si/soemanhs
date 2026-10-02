import React, { HTMLAttributes } from 'react';

export default function Card({ className = '', children, ...props }: HTMLAttributes<HTMLDivElement>) {
    return (
        <div
            className={`bg-white rounded-[16px] border border-gray-100 shadow-soft overflow-hidden hover:-translate-y-1 transition-transform duration-300 ${className}`}
            {...props}
        >
            {children}
        </div>
    );
}
