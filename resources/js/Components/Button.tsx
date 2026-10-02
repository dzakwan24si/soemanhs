import React, { ButtonHTMLAttributes } from 'react';

interface ButtonProps extends ButtonHTMLAttributes<HTMLButtonElement> {
    variant?: 'primary' | 'secondary' | 'cta' | 'outline-brand';
}

export default function Button({ className = '', variant = 'primary', children, ...props }: ButtonProps) {
    const baseClasses = 'inline-flex items-center justify-center px-4 py-2 border rounded-md font-semibold text-sm transition-all ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2';
    
    const variants = {
        primary: 'bg-brand-600 border-transparent text-white hover:bg-brand-700 focus:ring-brand-600',
        secondary: 'bg-brand-100 border-transparent text-brand-900 hover:bg-brand-200 focus:ring-brand-100',
        cta: 'bg-accent-500 border-transparent text-white hover:bg-orange-600 focus:ring-accent-500',
        'outline-brand': 'bg-transparent border-brand-600 text-brand-600 hover:bg-brand-50 focus:ring-brand-600',
    };

    return (
        <button
            {...props}
            className={`${baseClasses} ${variants[variant]} ${props.disabled && 'opacity-50 cursor-not-allowed'} ${className}`}
        >
            {children}
        </button>
    );
}
