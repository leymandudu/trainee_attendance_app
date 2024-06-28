<?php include 'templates/header.php'; ?>
<div class="container">
    <h1>List of Registered Trainees</h1>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Education Level</th>
            <th>IT Experience</th>
            <th>Program Enrolled</th>
            <th>Actions</th>
        </tr>
        <?php
        include 'includes/db.php';
        $stmt = $pdo->query('SELECT * FROM trainees');
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>{$row['firstname']}</td>";
            echo "<td>{$row['lastname']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['phone']}</td>";
            echo "<td>{$row['city']}</td>";
            echo "<td>{$row['state']}</td>";
            echo "<td>{$row['country']}</td>";
            echo "<td>{$row['education_level']}</td>";
            echo "<td>{$row['it_experience']}</td>";
            echo "<td>{$row['program_enrolled']}</td>";
            echo "<td><a href='edit_trainee.php?id={$row['id']}'>Edit</a> | <a href='delete_trainee.php?id={$row['id']}'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
<?php include 'templates/footer.php'; ?>
