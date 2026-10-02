import React, { HTMLAttributes } from 'react';

export default function Badge({ className = '', children, ...props }: HTMLAttributes<HTMLSpanElement>) {
    return (
        <span
            className={`inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-brand-100 text-brand-900 ${className}`}
            {...props}
        >
            {children}
        </span>
    );
}
