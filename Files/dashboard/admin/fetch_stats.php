<?php
include('../../../db_conn.php');

// Fetch total bookings
$totalBookingsQuery = "SELECT COUNT(*) as totalBookings FROM bookings";
$totalBookingsResult = $conn->query($totalBookingsQuery);
$totalBookings = $totalBookingsResult->fetch_assoc()['totalBookings'];

// Fetch total members
$totalMembersQuery = "SELECT COUNT(*) as totalMembers FROM members";
$totalMembersResult = $conn->query($totalMembersQuery);
$totalMembers = $totalMembersResult->fetch_assoc()['totalMembers'];

// Fetch upcoming events
$upcomingEventsQuery = "SELECT COUNT(*) as upcomingEvents FROM events WHERE event_date >= CURDATE()";
$upcomingEventsResult = $conn->query($upcomingEventsQuery);
$upcomingEvents = $upcomingEventsResult->fetch_assoc()['upcomingEvents'];

// Fetch monthly revenue
$monthlyRevenueQuery = "SELECT SUM(amount) as monthlyRevenue FROM bookings WHERE MONTH(booking_date) = MONTH(CURDATE()) AND YEAR(booking_date) = YEAR(CURDATE())";
$monthlyRevenueResult = $conn->query($monthlyRevenueQuery);
$monthlyRevenue = $monthlyRevenueResult->fetch_assoc()['monthlyRevenue'];

$data = array(
    'totalBookings' => $totalBookings,
    'totalMembers' => $totalMembers,
    'upcomingEvents' => $upcomingEvents,
    'monthlyRevenue' => $monthlyRevenue
);

echo json_encode($data);
?>
