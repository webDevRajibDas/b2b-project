<?php
$notifications = optional(auth()->user())->unreadNotifications;
$notifications_count = optional($notifications)->count();
$notifications_latest = optional($notifications)->take(5);
?>



