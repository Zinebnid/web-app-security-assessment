<?php
if( isset( $_REQUEST[ 'Submit' ] ) ) {
    $id = $_REQUEST[ 'id' ];

    // Prepared statement - safe version
    $stmt = $GLOBALS["___mysqli_ston"]->prepare(
        "SELECT first_name, last_name FROM users WHERE user_id = ?"
    );
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    while( $row = $result->fetch_assoc() ) {
        $first = $row["first_name"];
        $last  = $row["last_name"];
        $html .= "<pre>ID: {$id}<br />First name: {$first}<br />Surname: {$last}</pre>";
    }
    $stmt->close();
}
?>
