
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Directory Name</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body>

    <?php

    include('inc/db_connection.php');
    function fetchMembers($parent = NULL, $indent = 0)
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM Members WHERE ParentId " . ($parent ? "= ?" : "IS NULL"));
        $stmt->execute($parent ? [$parent] : []);
        $members = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($members) {
            echo '<ul>';
            foreach ($members as $member) {
                echo '<li>' . str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $indent) . $member['Name'];
                fetchMembers($member['Id'], $indent + 1);
                echo '</li>';
            }
            echo '</ul>';
        }
    }

    fetchMembers();
    ?>

    <button id="addMemberBtn">Add Member</button>

    <div id="addMemberForm" style="display: none;">
        <label for="parentDropdown">Parent:</label>
        <select id="parentDropdown">
            <!-- Options will be dynamically populated using JavaScript -->
        </select>
        <br>
        <label for="memberName">Name:</label>
        <input type="text" id="memberName" placeholder="Enter member name">
        <br>
        <button id="saveMemberBtn">Save Changes</button>
    </div>

</body>

</html>
