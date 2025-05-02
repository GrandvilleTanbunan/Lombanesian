/**
 * tutor-calendar.js
 * Script untuk menangani fungsionalitas kalender pada halaman profil mentor
 */

document.addEventListener('DOMContentLoaded', function() {
    // Elemen DOM
    const calendarGrid = document.getElementById('calendar-grid');
    const calendarTitle = document.querySelector('.calendar-container h3');
    const prevMonthBtn = document.getElementById('prev-month-btn');
    const nextMonthBtn = document.getElementById('next-month-btn');

    // Data dan status
    const today = new Date();
    let currentMonth = today.getMonth();
    let currentYear = today.getFullYear();

    // Mendapatkan data tanggal yang tersedia dari window global
    // Data ini dimasukkan oleh Blade template
    const availableDates = window.availableScheduleDates || [];

    // Nama-nama bulan dalam Bahasa Indonesia
    const monthNames = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    /**
     * Render kalender
     */
    function renderCalendar() {
        // Update judul kalender
        calendarTitle.textContent = `${monthNames[currentMonth]} ${currentYear}`;

        // Hapus hari-hari yang ada (kecuali header hari)
        const dayHeaders = Array.from(calendarGrid.querySelectorAll('div')).slice(0, 7);
        calendarGrid.innerHTML = '';

        // Kembalikan header hari
        dayHeaders.forEach(header => {
            calendarGrid.appendChild(header);
        });

        // Menentukan hari pertama bulan dan jumlah hari
        const firstDay = new Date(currentYear, currentMonth, 1);
        const lastDay = new Date(currentYear, currentMonth + 1, 0);
        const daysInMonth = lastDay.getDate();
        const startOffset = firstDay.getDay(); // 0 = Minggu, 1 = Senin, dst.

        // Tambahkan hari kosong untuk offset
        for (let i = 0; i < startOffset; i++) {
            const emptyDay = document.createElement('div');
            emptyDay.className = 'h-10';
            calendarGrid.appendChild(emptyDay);
        }

        // Tambahkan hari-hari dalam bulan
        for (let day = 1; day <= daysInMonth; day++) {
            const currentDate = new Date(currentYear, currentMonth, day);
            const formattedDate = formatDate(currentDate);

            // Cek apakah hari ini memiliki jadwal tersedia
            const scheduleInfo = availableDates.find(d => d.date === formattedDate);
            const hasSchedule = !!scheduleInfo;
            const availableCount = scheduleInfo ? scheduleInfo.availableCount : 0;

            // Cek apakah hari ini adalah hari ini dan/atau sudah lewat
            const isToday = isSameDay(currentDate, today);
            const isPast = currentDate < today;

            // Buat elemen hari
            const dayElement = document.createElement('div');
            dayElement.className = 'h-10 flex items-center justify-center relative group';
            dayElement.dataset.date = formattedDate;

            // Isi konten hari
            const dayContent = document.createElement('div');
            dayContent.className = 'w-9 h-9 flex items-center justify-center rounded-full text-sm';

            // Tambahkan kelas berdasarkan status
            if (isToday) {
                dayContent.classList.add('bg-blue-600', 'text-white');
            } else if (isPast) {
                dayContent.classList.add('text-gray-400');
            } else {
                dayContent.classList.add('text-gray-800');
            }

            if (hasSchedule && !isPast && availableCount > 0) {
                dayContent.classList.add('font-bold');

                // Tambahkan indikator untuk jadwal tersedia
                const indicator = document.createElement('span');
                indicator.className = 'absolute bottom-1 w-1 h-1 rounded-full bg-green-500';
                dayContent.appendChild(indicator);

                // Tambahkan tooltip
                const tooltip = document.createElement('div');
                tooltip.className = 'hidden group-hover:block absolute z-10 bottom-full mb-2 left-1/2 transform -translate-x-1/2 bg-white border border-gray-200 rounded-lg shadow-lg p-2 text-xs whitespace-nowrap';
                tooltip.innerHTML = `
                    <div class="font-medium text-gray-800">${day} ${monthNames[currentMonth]} ${currentYear}</div>
                    <div class="text-green-600">Ada ${availableCount} sesi tersedia</div>
                    <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 rotate-45 w-2 h-2 bg-white border-r border-b border-gray-200"></div>
                `;
                dayElement.appendChild(tooltip);

                // Tambahkan event click untuk hari yang memiliki jadwal tersedia
                dayElement.addEventListener('click', () => scrollToSchedule(formattedDate));
            }

            dayContent.textContent = day;
            dayElement.appendChild(dayContent);
            calendarGrid.appendChild(dayElement);
        }
    }

    /**
     * Helper: Format tanggal ke format YYYY-MM-DD
     */
    function formatDate(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    /**
     * Helper: Cek apakah dua tanggal adalah hari yang sama
     */
    function isSameDay(date1, date2) {
        return date1.getDate() === date2.getDate() &&
               date1.getMonth() === date2.getMonth() &&
               date1.getFullYear() === date2.getFullYear();
    }

    /**
     * Scroll ke jadwal untuk tanggal tertentu
     */
    function scrollToSchedule(date) {
        // Dapatkan elemen jadwal untuk tanggal yang dipilih
        const dateHeadings = document.querySelectorAll('.space-y-6 > div');
        const scheduleContainer = document.querySelector(`[data-date="${date}"]`);

        if (scheduleContainer) {
            // Scroll ke jadwal
            scheduleContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });

            // Highlight jadwal
            scheduleContainer.classList.add('highlight-schedule');
            setTimeout(() => {
                scheduleContainer.classList.remove('highlight-schedule');
            }, 2000);
            return;
        }

        // Cara alternatif: cari berdasarkan tanggal yang ditampilkan
        for (const heading of dateHeadings) {
            // Cek apakah heading ini adalah untuk tanggal yang kita cari
            const headingDate = heading.querySelector('h3');
            if (headingDate) {
                const dateText = headingDate.textContent;
                const selectedDate = new Date(date);
                const day = selectedDate.getDate();
                const month = monthNames[selectedDate.getMonth()];
                const year = selectedDate.getFullYear();

                if (dateText.includes(`${day}`) && dateText.includes(`${month}`) && dateText.includes(`${year}`)) {
                    // Scroll ke jadwal
                    heading.scrollIntoView({ behavior: 'smooth', block: 'start' });

                    // Highlight jadwal
                    heading.classList.add('highlight-schedule');
                    setTimeout(() => {
                        heading.classList.remove('highlight-schedule');
                    }, 2000);
                    break;
                }
            }
        }
    }

    // Event listener untuk navigasi bulan
    if (prevMonthBtn) {
        prevMonthBtn.addEventListener('click', () => {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            renderCalendar();
        });
    }

    if (nextMonthBtn) {
        nextMonthBtn.addEventListener('click', () => {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            renderCalendar();
        });
    }

    // Inisialisasi kalender
    if (calendarGrid && calendarTitle && availableDates.length > 0) {
        renderCalendar();
    }
});
