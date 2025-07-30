import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// Dashboard functionality
document.addEventListener('DOMContentLoaded', function () {
    // Auto-refresh dashboard data every 30 seconds
    if (window.location.pathname.includes('/admin')) {
        setInterval(refreshDashboardData, 30000);
    }

    // Initialize tooltips
    initializeTooltips();

    // Initialize charts if Chart.js is available
    if (typeof Chart !== 'undefined') {
        initializeCharts();
    }
});

// Refresh dashboard data
function refreshDashboardData() {
    fetch('/admin/dashboard-data')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                updateDashboardStats(data.data);
            }
        })
        .catch(error => {
            console.error('Error refreshing dashboard data:', error);
        });
}

// Update dashboard statistics
function updateDashboardStats(data) {
    // Update total barber
    const totalBarberElement = document.querySelector('[data-stat="total-barber"]');
    if (totalBarberElement) {
        totalBarberElement.textContent = data.totalBarber;
    }

    // Update total layanan
    const totalLayananElement = document.querySelector('[data-stat="total-layanan"]');
    if (totalLayananElement) {
        totalLayananElement.textContent = data.totalLayanan;
    }

    // Update booking hari ini
    const bookingHariIniElement = document.querySelector('[data-stat="booking-hari-ini"]');
    if (bookingHariIniElement) {
        bookingHariIniElement.textContent = data.bookingHariIni;
    }

    // Update total pendapatan
    const totalPendapatanElement = document.querySelector('[data-stat="total-pendapatan"]');
    if (totalPendapatanElement) {
        totalPendapatanElement.textContent = formatCurrency(data.totalPendapatan);
    }

    // Update barber aktif
    const barberAktifElement = document.querySelector('[data-stat="barber-aktif"]');
    if (barberAktifElement) {
        barberAktifElement.textContent = data.barberAktif;
    }

    // Update layanan aktif
    const layananAktifElement = document.querySelector('[data-stat="layanan-aktif"]');
    if (layananAktifElement) {
        layananAktifElement.textContent = data.layananAktif;
    }

    // Update booking minggu ini
    const bookingMingguIniElement = document.querySelector('[data-stat="booking-minggu-ini"]');
    if (bookingMingguIniElement) {
        bookingMingguIniElement.textContent = data.bookingMingguIni;
    }
}

// Format currency
function formatCurrency(amount) {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    }).format(amount);
}

// Initialize tooltips
function initializeTooltips() {
    const tooltipElements = document.querySelectorAll('[data-tooltip]');

    tooltipElements.forEach(element => {
        element.addEventListener('mouseenter', function () {
            const tooltipText = this.getAttribute('data-tooltip');
            showTooltip(this, tooltipText);
        });

        element.addEventListener('mouseleave', function () {
            hideTooltip();
        });
    });
}

// Show tooltip
function showTooltip(element, text) {
    const tooltip = document.createElement('div');
    tooltip.className = 'fixed z-50 px-2 py-1 text-xs text-white bg-gray-900 rounded shadow-lg';
    tooltip.textContent = text;
    tooltip.id = 'tooltip';

    document.body.appendChild(tooltip);

    const rect = element.getBoundingClientRect();
    tooltip.style.left = rect.left + (rect.width / 2) - (tooltip.offsetWidth / 2) + 'px';
    tooltip.style.top = rect.top - tooltip.offsetHeight - 5 + 'px';
}

// Hide tooltip
function hideTooltip() {
    const tooltip = document.getElementById('tooltip');
    if (tooltip) {
        tooltip.remove();
    }
}

// Initialize charts
function initializeCharts() {
    // Booking chart
    const bookingChartCtx = document.getElementById('bookingChart');
    if (bookingChartCtx) {
        new Chart(bookingChartCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Booking',
                    data: [12, 19, 3, 5, 2, 3],
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Booking Trend'
                    }
                }
            }
        });
    }

    // Revenue chart
    const revenueChartCtx = document.getElementById('revenueChart');
    if (revenueChartCtx) {
        new Chart(revenueChartCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Pendapatan',
                    data: [12000000, 19000000, 3000000, 5000000, 2000000, 3000000],
                    backgroundColor: 'rgba(34, 197, 94, 0.8)',
                    borderColor: 'rgb(34, 197, 94)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Pendapatan Bulanan'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function (value) {
                                return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                            }
                        }
                    }
                }
            }
        });
    }
}

// Form validation
function validateForm(form) {
    const requiredFields = form.querySelectorAll('[required]');
    let isValid = true;

    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            field.classList.add('border-red-500');
            isValid = false;
        } else {
            field.classList.remove('border-red-500');
        }
    });

    return isValid;
}

// Add form validation to all forms
document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('form');

    forms.forEach(form => {
        form.addEventListener('submit', function (e) {
            if (!validateForm(this)) {
                e.preventDefault();
                alert('Mohon lengkapi semua field yang wajib diisi.');
            }
        });
    });
});

// Auto-hide flash messages
document.addEventListener('DOMContentLoaded', function () {
    const flashMessages = document.querySelectorAll('.bg-green-50, .bg-red-50, .bg-yellow-50, .bg-blue-50');

    flashMessages.forEach(message => {
        setTimeout(() => {
            message.style.transition = 'opacity 0.5s ease-out';
            message.style.opacity = '0';
            setTimeout(() => {
                message.remove();
            }, 500);
        }, 5000);
    });
});

// Confirm delete actions
document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('[data-confirm-delete]');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            const message = this.getAttribute('data-confirm-delete') || 'Apakah Anda yakin ingin menghapus item ini?';

            if (!confirm(message)) {
                e.preventDefault();
            }
        });
    });
});
