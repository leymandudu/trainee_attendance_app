<?php
include 'templates/header.php';
include 'includes/db.php';

// Handle form submission to add trainee
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize input data
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $city = htmlspecialchars($_POST['city']);
    $state = htmlspecialchars($_POST['state']);
    $country = htmlspecialchars($_POST['country']);
    $education_level = isset($_POST['education_level']) ? htmlspecialchars($_POST['education_level'], ENT_NOQUOTES, 'UTF-8') : null;
    $it_experience = htmlspecialchars($_POST['it_experience']);
    $program_enrolled = htmlspecialchars($_POST['program_enrolled']);

    // Insert data into database using PDO prepared statements
    $stmt = $pdo->prepare("INSERT INTO trainees (firstname, lastname, email, phone, city, state, country, education_level, it_experience, program_enrolled) 
                           VALUES (:firstname, :lastname, :email, :phone, :city, :state, :country, :education_level, :it_experience, :program_enrolled)");
    
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':state', $state);
    $stmt->bindParam(':country', $country);
    $stmt->bindParam(':education_level', $education_level);
    $stmt->bindParam(':it_experience', $it_experience);
    $stmt->bindParam(':program_enrolled', $program_enrolled);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo '<div class="container"><p class="success">Trainee added successfully!</p></div>';
    } else {
        echo '<div class="container"><p class="error">Error adding trainee.</p></div>';
    }
}
?>

<div class="container">
    <h1>Add New Record</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required><br><br>
        
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required><br><br>
        
        <label for="city">City:</label>
        <input type="text" id="city" name="city" required><br><br>
        
        <label for="state">State:</label>
        <input type="text" id="state" name="state" required><br><br>
        
        <label for="country">Country:</label>
        <input type="text" id="country" name="country" required><br><br>
        
        <label for="education_level">Education Level:</label>
        <select id="education_level" name="education_level">
            <option value="">Select</option>
            <option value="High School">High School</option>
            <option value="Bachelor's Degree">Bachelor's Degree</option>
            <option value="Master's Degree">Master's Degree</option>
            <option value="PhD">PhD</option>
        </select><br><br>
        
        <label for="it_experience">IT Experience:</label>
        <select id="it_experience" name="it_experience" required>
            <option value="">Select</option>
            <option value="Advanced">Advanced</option>
            <option value="Intermediate">Intermediate</option>
            <option value="No Experience">No Experience</option>
        </select><br><br>
        
        <label for="program_enrolled">Program Enrolled:</label>
        <select id="program_enrolled" name="program_enrolled" required>
            <option value="">Select</option>
            <option value="Data Analytics Masterclass">Data Analytics</option>
            <option value="Python for OOP">Python for Data Analysis</option>
            <option value="Data Engineering">Data Engineering</option>
            <option value="Data Modeling">Data Modeling</option>
            <option value="Web Design">Web Design</option>
        </select><br><br>
        
        <input type="submit" value="Submit">
    </form>
</div>

<?php include 'templates/footer.php'; ?>
