<?php
session_start();
session_destroy(); // Destroy all session data
?>

<script>
// Use JavaScript to break out of the iframe and redirect the entire page
if (window !== top) {
    top.location.href = '../index.html';
} else {
    window.location.href = '../index.html';
}
</script>
