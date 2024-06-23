document.addEventListener('DOMContentLoaded', function() {
    fetchNotificationCount();
    fetchBookings();

    const form = document.getElementById('booking-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(form);
        fetch('booking.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Your booking has been submitted.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                fetchBookings();
                fetchNotificationCount();
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: data.message,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});

function fetchNotificationCount() {
    fetch('notification_count.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('notification-count').innerText = data.count;
        });
}

function fetchBookings() {
    fetch('fetch_bookings.php')
        .then(response => response.json())
        .then(data => {
            const bookingsDiv = document.getElementById('bookings');
            bookingsDiv.innerHTML = '';
            data.bookings.forEach(booking => {
                const bookingElement = document.createElement('div');
                bookingElement.innerText = `${booking.facility} on ${booking.booking_date} at ${booking.booking_time} - Status: ${booking.status}`;
                bookingsDiv.appendChild(bookingElement);
            });
        });
}
