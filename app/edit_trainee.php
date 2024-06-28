<?php
include 'templates/header.php';
include 'includes/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare('SELECT * FROM trainees WHERE id = :id');
    $stmt->execute(['id' => $id]);
    $trainee = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $city = htmlspecialchars($_POST['city']);
    $state = htmlspecialchars($_POST['state']);
    $country = htmlspecialchars($_POST['country']);
    $education_level = isset($_POST['education_level']) ? htmlspecialchars($_POST['education_level']) : null;
    $it_experience = htmlspecialchars($_POST['it_experience']);
    $program_enrolled = htmlspecialchars($_POST['program_enrolled']);

    $stmt = $pdo->prepare("UPDATE trainees SET firstname = :firstname, lastname = :lastname, email = :email, phone = :phone, city = :city, state = :state, country = :country, education_level = :education_level, it_experience = :it_experience, program_enrolled = :program_enrolled WHERE id = :id");
    $stmt->execute(['firstname' => $firstname, 'lastname' => $lastname, 'email' => $email, 'phone' => $phone, 'city' => $city, 'state' => $state, 'country' => $country, 'education_level' => $education_level, 'it_experience' => $it_experience, 'program_enrolled' => $program_enrolled, 'id' => $id]);
    header('Location: list_trainee.php');
}
?>

<div class="container">
    <h1>Modify Record</h1>
    <form method="post" action="edit_trainee.php">
        <input type="hidden" name="id" value="<?php echo $trainee['id']; ?>">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" value="<?php echo $trainee['firstname']; ?>" required><br><br>
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" value="<?php echo $trainee['lastname']; ?>" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $trainee['email']; ?>" required><br><br>
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $trainee['phone']; ?>" required><br><br>
        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="<?php echo $trainee['city']; ?>" required><br><br>
        <label for="state">State:</label>
        <input type="text" id="state" name="state" value="<?php echo $trainee['state']; ?>" required><br><br>
        <label for="country">Country:</label>
        <input type="text" id="country" name="country" value="<?php echo $trainee['country']; ?>" required><br><br>
        <label for="education_level">Education Level:</label>
        <select id="education_level" name="education_level">
            <option value="">Select</option>
            <option value="High School" <?php echo ($trainee['education_level'] == 'High School') ? 'selected' : ''; ?>>High School</option>
            <option value="Bachelor's Degree" <?php echo ($trainee['education_level'] == "Bachelor's Degree") ? 'selected' : ''; ?>>Bachelor's Degree</option>
            <option value="Master's Degree" <?php echo ($trainee['education_level'] == "Master's Degree") ? 'selected' : ''; ?>>Master's Degree</option>
            <option value="PhD" <?php echo ($trainee['education_level'] == 'PhD') ? 'selected' : ''; ?>>PhD</option>
        </select><br><br>
        <label for="it_experience">IT Experience:</label>
        <select id="it_experience" name="it_experience" required>
            <option value="Advanced" <?php echo ($trainee['it_experience'] == 'Advanced') ? 'selected' : ''; ?>>Advanced</option>
            <option value="Intermediate" <?php echo ($trainee['it_experience'] == 'Intermediate') ? 'selected' : ''; ?>>Intermediate</option>
            <option value="No Experience" <?php echo ($trainee['it_experience'] == 'No Experience') ? 'selected' : ''; ?>>No Experience</option>
        </select><br><br>
        <label for="program_enrolled">Program Enrolled:</label>
        <select id="program_enrolled" name="program_enrolled" required>
            <option value="">Select</option>
            <option value="Data Analytics Masterclass" <?php echo ($trainee['program_enrolled'] == 'Data Analytics Masterclass') ? 'selected' : ''; ?>>Data Analytics Masterclass</option>
            <option value="Python for OOP" <?php echo ($trainee['program_enrolled'] == 'Python for OOP') ? 'selected' : ''; ?>>Python for OOP</option>
            <option value="Data Engineering" <?php echo ($trainee['program_enrolled'] == 'Data Engineering') ? 'selected' : ''; ?>>Data Engineering</option>
            <option value="Data Modeling" <?php echo ($trainee['program_enrolled'] == 'Data Modeling') ? 'selected' : ''; ?>>Data Modeling</option>
            <option value="Web Design" <?php echo ($trainee['program_enrolled'] == 'Web Design') ? 'selected' : ''; ?>>Web Design</option>
        </select><br><br>
        <input type="submit" value="Submit">
    </form>
</div>
<?php include 'templates/footer.php'; ?>
