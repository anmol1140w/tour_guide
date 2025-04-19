<?php
$host = 'localhost';
$db = 'tour_guide';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db, 3307);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

try {
    if (!isset($_GET['city']) || !isset($_GET['genre']) || !isset($_GET['dist'])) {
        throw new Exception('Missing required parameters');
    }

    $city = $conn->real_escape_string($_GET['city']);
    $genre = $conn->real_escape_string($_GET['genre']);
    $range = intval($_GET['dist']);

    $query = "SELECT * FROM places WHERE city = '$city' AND genre = '$genre' AND dist = $range";
    $result = $conn->query($query);

    if (!$result) {
        throw new Exception("Query failed: " . $conn->error);
    }

    $html = '';
    while ($row = $result->fetch_assoc()) {

        $html .= '<div class="location-card">';
        $html .= '<h3>' . htmlspecialchars($row['name']) . '</h3>';
        $html .= '<p class="text-muted">' . htmlspecialchars($row['genre']) . '</p>';
        $html .= '<p>' . htmlspecialchars($row['city']) . '</p>';
        $html .= '<button class="btn btn-sm btn-outline-primary view-details-btn"> View Details</button>';
        $html .= '</div>';
    }

    echo $html;
    $conn->close();

} catch (Exception $e) {
    http_response_code(400);
    echo '<p class="text-danger">' . htmlspecialchars($e->getMessage()) . '</p>';
}
?>
