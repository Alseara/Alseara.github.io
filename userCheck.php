<?php
include 'conn.php';
                session_start(); // Start the session
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $userID = $_POST["userID"];
    $password = $_POST["pass"];

    // SQL query with prepared statement
    $sql = "SELECT * FROM tblclinicianinfo WHERE stud_id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $userID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Check if any row is returned
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Verify the password using password_verify
            if ($password === $row['cpass']) {
                // User exists with the given credentials, redirect to the home page
                $_SESSION['userID'] = $userID;
                header("Location: Clinician's Homepage.php");
                exit();
            } else {         
                // Invalid credentials, display an alert
                $error_message = "Password Incorrect";
            }
        } else {
            // Invalid credentials, display an alert
            $error_message = "User Not Found";
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
        // Error preparing the statement
        $error_message = "Error preparing statement: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);

    // Display error message and refresh
    header('Refresh: .1; URL=Login3.php');
    echo '<script>alert("'.$error_message.'");</script>';
}
?>
