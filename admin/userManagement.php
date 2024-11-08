<?php
include_once "../include/db.php";

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if user_id and action are set
    if (isset($_POST['user_id']) && isset($_POST['action'])) {
        $userId = (int)$_POST['user_id'];
        $action = $_POST['action'];

        if ($action === 'remove') {
            removeUser($conn, $userId);
        } elseif ($action === 'suspend') {
            suspendUser($conn, $userId);
        } elseif ($action === 'change') {
            ChangeUser($conn, $userId);
        }

        // Redirect back to the manage users page
        header("Location:adminDashboard.php?page=userManagement");
        exit;
    }
}

// Function to remove a user
function removeUser($conn, $userId)
{
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);
    if (!$stmt->execute()) {
        echo "Error removing user: " . $stmt->error;
    }
    $stmt->close();
}
function changeUser($conn, $userId)
{
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['user_type'] == 'admin') {
            $stmt = $conn->prepare("UPDATE users SET user_type = 'user' WHERE id = ?");
            $stmt->bind_param("i", $userId);
            if (!$stmt->execute()) {
                echo "Error removing user: " . $stmt->error;
            }
        } else {
            $stmt = $conn->prepare("UPDATE users SET user_type = 'admin' WHERE id = ?");
            $stmt->bind_param("i", $userId);
            if (!$stmt->execute()) {
                echo "Error removing user: " . $stmt->error;
            }
        }
    }
}

// Function to suspend a user
function suspendUser($conn, $userId)
{
    $stmt = $conn->prepare("UPDATE users SET status = 'suspended' WHERE id = ?");
    $stmt->bind_param("i", $userId);
    if (!$stmt->execute()) {
        echo "Error suspending user: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <style>
        /* Basic styling for table and buttons */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            margin: 2px;
            border: none;
            cursor: pointer;
        }

        .remove-btn {
            background-color: #ff6666;
            color: white;
        }

        .suspend-btn {
            background-color: #ffcc00;
            color: white;
        }
    </style>
</head>

<body>
    <h1>Manage Users</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT id, name, email,user_type FROM users";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>
                            <form action='userManagement.php' method='POST' style='display:inline;'>
                                <input type='hidden' name='user_id' value='" . htmlspecialchars($row['id']) . "'>
                                <button type='submit' name='action' value='remove' class='remove-btn btn-md btn'>Remove</button>
                            </form>
                            <form action='userManagement.php' method='POST' style='display:inline;'>
                                <input type='hidden' name='user_id' value='" . htmlspecialchars($row['id']) . "'>
                                <button type='submit' name='action' value='suspend' class='suspend-btn btn-md btn'>Suspend</button>
                            </form>
                            <form action='userManagement.php' method='POST' style='display:inline;'>
                                <input type='hidden' name='user_id' value='" . htmlspecialchars($row['id']) . "'>
                                <button type='submit' name='action' value='change' class='btn btn-primary btn-md'>Make As " . htmlspecialchars($row['user_type']) . "</button>
                            </form>
                        </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No users found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>

<?php
// Close the connection at the very end of the script
mysqli_close($conn);
?>