import React from 'react';

export default function StarPattern({ className = '' }: { className?: string }) {
    return (
        <svg
            className={`opacity-10 text-brand-900 ${className}`}
            width="100"
            height="100"
            viewBox="0 0 100 100"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path
                d="M50 0L61.2 38.8L100 50L61.2 61.2L50 100L38.8 61.2L0 50L38.8 38.8L50 0Z"
                fill="currentColor"
            />
            <path
                d="M14.6 14.6L44.4 34.6L85.4 14.6L65.4 44.4L85.4 85.4L44.4 65.4L14.6 85.4L34.6 44.4L14.6 14.6Z"
                fill="currentColor"
            />
        </svg>
    );
}
