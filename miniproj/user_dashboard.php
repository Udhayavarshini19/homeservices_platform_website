<?php
include_once "./include/header.php";
include_once "./scripts/DB.php";
require_once "./scripts/session.php";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: userlogin.php');
    exit();
}

// Get logged-in user ID
$user_id = $_SESSION['user_id'];

// Handle cancel request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancel_booking_id'])) {
    $cancel_booking_id = $_POST['cancel_booking_id'];
    
    try {
        // Execute the cancellation query
        DB::query("DELETE FROM bookings WHERE id = ? AND user_id = ?", [$cancel_booking_id, $user_id]);
        echo "<div class='alert alert-success'>Booking successfully cancelled.</div>";
    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>Error cancelling booking: " . htmlspecialchars($e->getMessage()) . "</div>";
    }
}

try {
    // Fetch all bookings for the logged-in user
    $bookings = DB::query("SELECT bookings.id, bookings.date, bookings.status, providers.name as provider_name, providers.profession , providers.contact
                           FROM bookings
                           JOIN providers ON bookings.provider_id = providers.id
                           WHERE bookings.user_id = ?
                           ORDER BY bookings.date DESC", [$user_id])->fetchAll(PDO::FETCH_OBJ);
} catch (Exception $e) {
    $bookings = null;
    error_log("Database error: " . $e->getMessage());
}
?>
<style>
    body{
        background-color: #353a3f;
    }
    </style>
<div class="container" style="margin-top: 30px;">
    <h3>Your Service Bookings</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Provider Name</th>
                    <th> Provider contact</th>
                    <th>Profession</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($bookings !== null && count($bookings) > 0): ?>
                    <?php foreach ($bookings as $booking): ?>
                        <tr>
                            <td><?= htmlspecialchars($booking->id); ?></td>
                            <td><?= htmlspecialchars($booking->provider_name); ?></td>
                            <td><?= htmlspecialchars($booking->contact); ?></td>
                            <td><?= htmlspecialchars($booking->profession); ?></td>
                            <td><?= htmlspecialchars($booking->date); ?></td>
                            <td><?= htmlspecialchars($booking->status); ?></td>
                            <td>
                                <form method="POST" onsubmit="return confirm('Are you sure you want to cancel this booking?');">
                                    <input type="hidden" name="cancel_booking_id" value="<?= htmlspecialchars($booking->id); ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No bookings found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once "./include/footer.php"; ?>
