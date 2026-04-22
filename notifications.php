<?php
session_start();
require __DIR__ . "/backend/db.php";      
$stmt = $conn->prepare("SELECT subject,message FROM notifications");
$stmt->execute();
$result = $stmt->get_result();
$notifications = $result->fetch_all(MYSQLI_ASSOC);
?>

        <div class="table-wrap">
            <table class="users-table" id="usersTable">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Message</th>
                    </tr>
                </thead>
        <?php foreach ($notifications as $notification): ?>
                        <tbody id="usersBody">
                            <td><?php echo htmlspecialchars($notification['subject']); ?></td>
                            <td><?php echo htmlspecialchars($notification['message']); ?></td>
                        </tbody>
                        <?php endforeach; ?>
            </table>

