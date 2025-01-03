<?php
session_start();
include_once './include/header.php';
include_once "./scripts/DB.php";
if (!isset($_SESSION['provider_id'])) {
    header('Location: login.php');
    exit();
}

$provider_id = $_SESSION['provider_id'];

// Fetch provider information
$provider = DB::query("SELECT * FROM providers WHERE id = ?", [$provider_id])->fetch(PDO::FETCH_OBJ);

if (!$provider) {
    echo "Provider not found.";
    exit();
}


//$provider_id = 1; // Example provider ID, replace with actual provider ID from session or login system

// Fetch pending and accepted bookings for the provider
$bookings = DB::query("SELECT * FROM bookings WHERE provider_id = ? AND (status = 'pending' OR status = 'accepted')", [$provider_id]);

// Fetch finished bookings for history
$finishedBookings = DB::query("SELECT * FROM bookings WHERE provider_id = ? AND status = 'finished'", [$provider_id]);

if ($bookings === null || $finishedBookings === null) {
    echo "<p>Error retrieving bookings. Please try again later.</p>";
    exit();
}
?>
<style>
    body{
        background-color: #353a3f;
    }
    </style>
<div class="container">
    <h2>Dashboard</h2>

    <!-- Pending and Accepted Bookings -->
    <h3>Pending and Accepted Bookings</h3>
    <?php if ($bookings->rowCount() > 0): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Requester Name</th>
                    <th>Requester Contact</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Problem</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($booking = $bookings->fetch(PDO::FETCH_OBJ)): ?>
                    <tr>
                        <td><?= htmlspecialchars($booking->name); ?></td>
                        <td><?= htmlspecialchars($booking->contact); ?></td>
                        <td><?= htmlspecialchars($booking->adder); ?></td>
                        <td><?= htmlspecialchars($booking->date); ?></td>
                        <td><?= htmlspecialchars($booking->queries); ?></td>
                        <td><?= htmlspecialchars($booking->status); ?></td>
                        <td>
                            <form method="POST" action="respond_booking.php" style="display: inline;">
                                <input type="hidden" name="booking_id" value="<?= $booking->id; ?>">
                                <?php if ($booking->status == 'pending'): ?>
                                    <button type="submit" name="action" value="accept" class="btn btn-success">Accept</button>
                                    <button type="submit" name="action" value="deny" class="btn btn-danger">Deny</button>
                                <?php elseif ($booking->status == 'accepted'): ?>
                                    <button type="submit" name="action" value="finish" class="btn btn-primary">Mark as Finished</button>
                                <?php endif; ?>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No pending or accepted bookings.</p>
    <?php endif; ?>

    <hr>

    <!-- History of Finished Bookings -->
    <h3>Service History</h3>
    <?php if ($finishedBookings->rowCount() > 0): ?>
        <table class="table">
            <thead>
                <tr>
                   <th>Requester Contact</th>
                    <th>Requester Contact</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Problem</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($booking = $finishedBookings->fetch(PDO::FETCH_OBJ)): ?>
                    <tr>
                    <td><?= htmlspecialchars($booking->name); ?></td>
                        <td><?= htmlspecialchars($booking->contact); ?></td>
                        <td><?= htmlspecialchars($booking->adder); ?></td>
                        <td><?= htmlspecialchars($booking->date); ?></td>
                        <td><?= htmlspecialchars($booking->queries); ?></td>
                        <td><?= htmlspecialchars($booking->status); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No finished bookings.</p>
    <?php endif; ?>
</div>
