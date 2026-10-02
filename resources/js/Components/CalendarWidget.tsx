import React, { useState } from 'react';

export default function CalendarWidget() {
    // Generate dummy dates
    const currentDate = new Date();
    
    // Hijri Date Formatter
    const hijriFormatter = new Intl.DateTimeFormat('id-ID-u-ca-islamic', {
        day: 'numeric',
    });
    
    const [selectedMonth, setSelectedMonth] = useState(currentDate.getMonth());

    const months = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni", 
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];

    // Dummy events for the selected month
    const events = [
        { date: 15, title: '[CONTOH] Hari Pertama Masuk Sekolah', type: 'akademik' },
        { date: 20, title: '[CONTOH] Puasa Sunnah Ayyamul Bidh', type: 'islamic' },
        { date: 28, title: '[CONTOH] Ujian Tengah Semester', type: 'akademik' },
    ];

    const daysInMonth = new Date(currentDate.getFullYear(), selectedMonth + 1, 0).getDate();
    const firstDayOfMonth = new Date(currentDate.getFullYear(), selectedMonth, 1).getDay();

    return (
        <div className="bg-white rounded-2xl shadow-soft overflow-hidden border border-gray-100 flex flex-col lg:flex-row">
            {/* Left Panel: Months List */}
            <div className="bg-brand-600 text-white p-6 lg:w-1/4 flex flex-col">
                <h3 className="text-2xl font-heading font-bold mb-6 uppercase">{currentDate.getFullYear()}/{currentDate.getFullYear() + 1}</h3>
                <div className="flex-1 overflow-y-auto pr-2 space-y-1">
                    {months.map((month, idx) => (
                        <button 
                            key={idx}
                            onClick={() => setSelectedMonth(idx)}
                            className={`w-full text-left px-4 py-3 rounded-xl transition-colors ${selectedMonth === idx ? 'bg-white/20 font-bold' : 'hover:bg-white/10 opacity-80'}`}
                        >
                            {month}
                        </button>
                    ))}
                </div>
            </div>

            {/* Middle Panel: Calendar Grid */}
            <div className="p-6 lg:p-8 lg:w-2/4 border-b lg:border-b-0 lg:border-r border-gray-100">
                <div className="flex justify-between items-center mb-6">
                    <h4 className="text-2xl font-heading font-bold text-ink-900">{months[selectedMonth]} {currentDate.getFullYear()}</h4>
                </div>
                
                <div className="grid grid-cols-7 gap-1 text-center mb-2">
                    {['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'].map((day, idx) => (
                        <div key={idx} className="font-bold text-ink-400 text-sm py-2">{day}</div>
                    ))}
                </div>
                
                <div className="grid grid-cols-7 gap-1 lg:gap-2 text-center">
                    {Array.from({ length: firstDayOfMonth }).map((_, idx) => (
                        <div key={`empty-${idx}`} className="p-2"></div>
                    ))}
                    
                    {Array.from({ length: daysInMonth }).map((_, idx) => {
                        const day = idx + 1;
                        const hasEvent = events.find(e => e.date === day);
                        const tempDate = new Date(currentDate.getFullYear(), selectedMonth, day);
                        const hijriDay = hijriFormatter.format(tempDate);
                        const isToday = day === currentDate.getDate() && selectedMonth === currentDate.getMonth();

                        return (
                            <div 
                                key={day} 
                                className={`relative flex flex-col items-center justify-center p-2 rounded-xl border ${hasEvent ? 'border-brand-200 bg-brand-50' : 'border-transparent hover:border-gray-100'} ${isToday ? 'bg-gold-500 text-brand-900 font-bold' : ''}`}
                            >
                                <span className={`text-lg font-heading ${isToday ? '' : 'text-ink-900'}`}>{day}</span>
                                <span className={`text-[10px] ${isToday ? 'text-brand-900/80' : 'text-brand-500'} font-arabic`}>{hijriDay}</span>
                                {hasEvent && (
                                    <span className="absolute bottom-1 w-1.5 h-1.5 rounded-full bg-brand-600"></span>
                                )}
                            </div>
                        );
                    })}
                </div>
                <div className="mt-6 pt-4 border-t border-gray-100">
                    <p className="text-xs text-ink-400">
                        * Tanggal kecil di bawah adalah penanggalan Hijriah.
                    </p>
                </div>
            </div>

            {/* Right Panel: Agenda List */}
            <div className="p-6 lg:p-8 lg:w-1/4 bg-gray-50/50">
                <h4 className="text-xl font-heading font-bold text-ink-900 mb-6">Agenda Terdekat</h4>
                <div className="space-y-4">
                    {events.map((event, idx) => (
                        <div key={idx} className="bg-white p-4 rounded-xl border border-gray-100 shadow-sm flex flex-col">
                            <div className="flex items-center justify-between mb-2">
                                <span className="text-2xl font-heading font-bold text-brand-600">{event.date}</span>
                                <span className="text-xs font-bold px-2 py-1 bg-cream-50 text-gold-600 rounded-md uppercase tracking-wider">{months[selectedMonth].substring(0,3)}</span>
                            </div>
                            <h5 className="font-semibold text-ink-900 text-sm leading-snug">{event.title}</h5>
                            <div className="flex items-center gap-1.5 mt-3">
                                <span className={`w-1.5 h-1.5 rounded-full ${event.type === 'islamic' ? 'bg-gold-500' : 'bg-brand-600'}`}></span>
                                <span className="text-xs text-ink-400 capitalize">{event.type}</span>
                            </div>
                        </div>
                    ))}
                    {events.length === 0 && (
                        <p className="text-ink-400 text-sm text-center py-4">Tidak ada agenda di bulan ini.</p>
                    )}
                </div>
                <div className="mt-8 text-center">
                    <button className="text-brand-600 font-bold text-sm uppercase tracking-wider hover:text-brand-800 transition-colors">Lihat Semua</button>
                </div>
            </div>
        </div>
    );
}
