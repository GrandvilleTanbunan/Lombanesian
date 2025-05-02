// tutor-profile.js - JavaScript untuk halaman profil mentor

document.addEventListener('DOMContentLoaded', function() {
    // Animasi saat pertama kali halaman dibuka
    animateScheduleItems();

    // Fungsi untuk menampilkan jadwal dengan animasi
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

    // Scroll ke jadwal spesifik saat tanggal di kalender diklik
    const calendarDays = document.querySelectorAll('.calendar-container .h-10');
    calendarDays.forEach(day => {
        day.addEventListener('click', function() {
            // Dapatkan tanggal yang diklik
            const dayNumber = this.querySelector('div').textContent.trim();
            if (dayNumber && !isNaN(dayNumber)) {
                // Tanggal ini memiliki jadwal?
                const hasSchedule = this.querySelector('.bg-green-500');
                if (hasSchedule) {
                    // Format tanggal untuk perbandingan
                    const month = document.querySelector('.calendar-container h3').textContent.trim();
                    const [monthName, year] = month.split(' ');

                    // Cari header jadwal dengan tanggal yang sesuai
                    const scheduleHeaders = document.querySelectorAll('.space-y-6 h3');

                    scheduleHeaders.forEach(header => {
                        const dateText = header.textContent.trim();
                        // Jika header jadwal mengandung tanggal yang diklik
                        if (dateText.includes(dayNumber)) {
                            // Scroll ke item jadwal tersebut
                            header.scrollIntoView({ behavior: 'smooth', block: 'start' });

                            // Highlight sementara item tersebut
                            const parentDiv = header.closest('div');
                            parentDiv.classList.add('highlight-item');
                            setTimeout(() => {
                                parentDiv.classList.remove('highlight-item');
                            }, 2000);
                        }
                    });
                }
            }
        });
    });

    // Tambahkan animasi hover pada item jadwal
    const scheduleItems = document.querySelectorAll('.border-l-4');
    scheduleItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.classList.add('shadow-md', 'scale-[1.02]');
        });

        item.addEventListener('mouseleave', function() {
            this.classList.remove('shadow-md', 'scale-[1.02]');
        });
    });

    // Tombol navigasi kalender (dummy function untuk demonstrasi)
    const prevMonthBtn = document.querySelector('.fa-chevron-left').parentElement;
    const nextMonthBtn = document.querySelector('.fa-chevron-right').parentElement;

    prevMonthBtn.addEventListener('click', function() {
        // Alert untuk demo (akan diganti dengan navigasi bulan sebenarnya)
        alert('Navigasi ke bulan sebelumnya akan diimplementasikan');
    });

    nextMonthBtn.addEventListener('click', function() {
        // Alert untuk demo (akan diganti dengan navigasi bulan sebenarnya)
        alert('Navigasi ke bulan berikutnya akan diimplementasikan');
    });
});

// Tambahkan CSS untuk animasi highlight
document.head.insertAdjacentHTML('beforeend', `
    <style>
        @keyframes highlight-pulse {
            0% { background-color: rgba(59, 130, 246, 0); }
            50% { background-color: rgba(59, 130, 246, 0.1); }
            100% { background-color: rgba(59, 130, 246, 0); }
        }

        .highlight-item {
            animation: highlight-pulse 2s ease-in-out;
        }

        .border-l-4 {
            transition: transform 0.2s ease-out, box-shadow 0.3s ease-out;
        }

        .border-l-4:hover {
            transform: translateY(-2px);
        }

        .calendar-container .h-10:has(.w-1.h-1.bg-green-500) {
            cursor: pointer;
        }

        .calendar-container .h-10:has(.w-1.h-1.bg-green-500):hover div {
            background-color: #f0f9ff;
        }
    </style>
`);

// Tambahkan indikator jadwal menggunakan badge
function updateScheduleBadges() {
    const availableSchedules = document.querySelectorAll('.px-3.py-1.bg-green-100').length;

    if (availableSchedules > 0) {
        // Tambahkan badge pada heading jadwal
        const scheduleHeading = document.querySelector('#jadwal h2');
        if (scheduleHeading && !scheduleHeading.querySelector('.schedule-badge')) {
            const badge = document.createElement('span');
            badge.className = 'schedule-badge ml-2 px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full';
            badge.textContent = `${availableSchedules} tersedia`;
            scheduleHeading.appendChild(badge);
        }
    }
}

// Jalankan saat halaman dimuat
setTimeout(updateScheduleBadges, 500);

// Tambahkan fitur filter jadwal berdasarkan ketersediaan
function setupScheduleFilter() {
    const scheduleSection = document.querySelector('#jadwal .bg-white.rounded-lg.shadow-md.p-6:last-child');

    if (scheduleSection) {
        // Buat filter
        const filterDiv = document.createElement('div');
        filterDiv.className = 'flex items-center justify-end mb-4 space-x-2 text-sm';
        filterDiv.innerHTML = `
            <span class="text-gray-600">Filter:</span>
            <button class="filter-btn px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200 transition-colors active" data-filter="all">Semua</button>
            <button class="filter-btn px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200 transition-colors" data-filter="available">Tersedia</button>
            <button class="filter-btn px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200 transition-colors" data-filter="unavailable">Terisi</button>
        `;

        // Sisipkan filter di bawah heading
        scheduleSection.querySelector('h2').after(filterDiv);

        // Tambahkan event listener
        const filterButtons = filterDiv.querySelectorAll('.filter-btn');
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
        const visibleItems = container.querySelectorAll('.border-l-4[style="display: block"]').length;
        if (visibleItems === 0) {
            container.style.display = 'none';
        } else {
            container.style.display = 'block';
        }
    });
}

// Setup filter jadwal
setTimeout(setupScheduleFilter, 500);

// Tambahkan animasi smooth scroll untuk tombol Lihat Jadwal
const scheduleBtn = document.querySelector('a[href="#jadwal"]');
if (scheduleBtn) {
    scheduleBtn.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector('#jadwal');
        if (target) {
            window.scrollTo({
                top: target.offsetTop - 20,
                behavior: 'smooth'
            });
        }
    });
}

// Fungsi untuk memperluas deskripsi lomba ketika diklik
const expandableLombaDesc = document.querySelectorAll('.line-clamp-2');
expandableLombaDesc.forEach(desc => {
    const fullText = desc.textContent;
    desc.addEventListener('click', function() {
        if (this.classList.contains('line-clamp-2')) {
            this.classList.remove('line-clamp-2');
            this.classList.add('expanded-desc');
        } else {
            this.classList.add('line-clamp-2');
            this.classList.remove('expanded-desc');
        }
    });

    // Tambahkan indikator bahwa teks dapat diexpand
    if (desc.scrollHeight > desc.clientHeight) {
        const indicator = document.createElement('span');
        indicator.className = 'text-xs text-blue-500 block mt-1';
        indicator.textContent = 'Klik untuk melihat lebih banyak';
        desc.after(indicator);
    }
});
