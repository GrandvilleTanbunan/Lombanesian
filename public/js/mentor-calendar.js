/**
 * mentor-calendar.js - Script gabungan untuk fungsionalitas kalender mentor
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
    // PENTING: Pastikan availableScheduleDates terdefinisi di view Blade
    const availableDates = window.availableScheduleDates || [];
    console.log("Available dates loaded:", availableDates); // Debugging

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
        if (calendarTitle) {
            calendarTitle.textContent = `${monthNames[currentMonth]} ${currentYear}`;
        }

        // Hapus hari-hari yang ada (kecuali header hari)
        if (!calendarGrid) {
            console.error("Calendar grid element not found!");
            return;
        }

        const dayHeaders = Array.from(calendarGrid.querySelectorAll('.h-8'));
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
            dayContent.className = 'w-9 h-9 flex items-center justify-center rounded-full text-sm relative'; // Tambahkan 'relative'

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
                tooltip.className = 'absolute z-10 bottom-full mb-2 left-1/2 transform -translate-x-1/2 bg-white border border-gray-200 rounded-lg shadow-lg p-2 text-xs whitespace-nowrap hidden group-hover:block';
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
        const dateHeadings = document.querySelectorAll('.space-y-6 > div');
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

    // Setup fitur filter jadwal
    setupScheduleFilter();

    // Tambahkan animasi jadwal saat halaman dimuat
    animateScheduleItems();

    // Inisialisasi kalender
    if (calendarGrid && calendarTitle) {
        renderCalendar();
        console.log("Calendar initialized");
    } else {
        console.error("Calendar elements not found", {
            calendarGrid: !!calendarGrid,
            calendarTitle: !!calendarTitle
        });
    }

    // Animasi jadwal
    function animateScheduleItems() {
        const scheduleItems = document.querySelectorAll('.grid-cols-1 > div');

        scheduleItems.forEach((item, index) => {
            // Tambahkan kelas untuk animasi
            item.classList.add('transform', 'translate-y-4', 'opacity-0');

            // Animasikan dengan delay bertahap
            setTimeout(() => {
                item.classList.add('transition-all', 'duration-500', 'ease-out');
                item.classList.remove('translate-y-4', 'opacity-0');
            }, 100 * index);
        });
    }

    // Setup filter jadwal
    function setupScheduleFilter() {
        // Event listener untuk filter jadwal
        const filterButtons = document.querySelectorAll('.filter-btn');
        filterButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                // Update status aktif
                filterButtons.forEach(b => b.classList.remove('active', 'bg-blue-100', 'text-blue-800'));
                this.classList.add('active', 'bg-blue-100', 'text-blue-800');

                const filter = this.dataset.filter;
                filterScheduleItems(filter);
            });
        });
    }

    // Filter jadwal berdasarkan ketersediaan
    function filterScheduleItems(filter) {
        const scheduleItems = document.querySelectorAll('.border-l-4');
        const dateContainers = document.querySelectorAll('.space-y-6 > div');

        scheduleItems.forEach(item => {
            if (filter === 'all') {
                item.style.display = 'block';
            } else if (filter === 'available' && item.classList.contains('border-l-green-500')) {
                item.style.display = 'block';
            } else if (filter === 'unavailable' && item.classList.contains('border-l-red-500')) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });

        // Sembunyikan container tanggal jika tidak ada jadwal terlihat di dalamnya
        dateContainers.forEach(container => {
            const visibleItems = Array.from(container.querySelectorAll('.border-l-4')).filter(
                item => item.style.display !== 'none'
            ).length;

            if (visibleItems === 0) {
                container.style.display = 'none';
            } else {
                container.style.display = 'block';
            }
        });

        // Tampilkan pesan jika tidak ada hasil
        const noResultsMessage = document.getElementById('no-filter-results');
        const visibleContainers = Array.from(dateContainers).filter(
            container => container.style.display !== 'none'
        ).length;

        if (visibleContainers === 0) {
            if (!noResultsMessage) {
                const message = document.createElement('div');
                message.id = 'no-filter-results';
                message.className = 'text-center py-6 text-gray-500';
                message.innerHTML = `
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-filter text-gray-400 text-xl"></i>
                    </div>
                    <p>Tidak ada jadwal yang sesuai dengan filter "${filter === 'available' ? 'Tersedia' : 'Terisi'}"</p>
                `;

                const scheduleContainer = document.querySelector('.space-y-6');
                scheduleContainer.parentNode.insertBefore(message, scheduleContainer.nextSibling);
            }
        } else if (noResultsMessage) {
            noResultsMessage.remove();
        }
    }

    // Tambahkan animasi smooth scroll untuk tombol Lihat Jadwal
    const scheduleBtn = document.querySelector('a[href="#jadwal"]');
    if (scheduleBtn) {
        scheduleBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.getElementById('jadwal');
            if (target) {
                window.scrollTo({
                    top: target.offsetTop - 20,
                    behavior: 'smooth'
                });
            }
        });
    }
});

// Fungsi untuk menyalin link profil (dipanggil dari inline onclick di HTML)
function copyProfileLink() {
    // Implementasi ada di profil.blade.php
    console.log("Copy profile link function called");
}
