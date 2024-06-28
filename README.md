# Trainee Management Web Application

This web application is designed to manage trainee information for a company that trains individuals to become data analysts. It allows you to add, list, edit, and delete trainee records. The application is built using PHP for server-side scripting and MySQL for the database backend. The frontend is styled using CSS for a professional and responsive design.

## Features

- **Add Trainee**: Add new trainee information including first name, last name, email, phone number, city, state, country, education level, IT experience, and program enrolled.
- **List Trainees**: View a list of all registered trainees with their details in a tabular format.
- **Edit Trainee**: Modify existing trainee information such as updating personal details or program enrollment.
- **Delete Trainee**: Remove a trainee record from the database.

## Folder Structure

```
- app/
  - css/
    - styles.css         # CSS styles for styling the web pages
  - js/                   # (Optional) JavaScript files
  - includes/
    - db.php             # PHP script for database connection
  - templates/
    - header.php         # Header template for common header content
    - footer.php         # Footer template for common footer content
  - index.php            # Home page with welcome message
  - add_trainee.php      # Page to add new trainee
  - list_trainees.php    # Page to list registered trainees
  - edit_trainee.php     # Page to edit trainee information
  - delete_trainee.php   # PHP script to delete trainee record
- assets/
  - images/              # (Optional) Image assets
- sql/
  - schema.sql           # SQL script for database schema
- README.md              # Documentation file (you are here)
```

## Setup Instructions

1. **Database Setup**:
   - Create a MySQL database. Use `sql/schema.sql` to create the necessary table (`trainees`).

2. **Database Configuration**:
   - Update `app/includes/db.php` with your database credentials (`$host`, `$dbname`, `$username`, `$password`).

3. **Run the Application**:
   - Ensure your development environment supports PHP.
   - Start a local server or use XAMPP/WAMP/LAMP.
   - Access the application through the browser (`http://localhost/path/to/index.php`).

## Usage

- **Adding a Trainee**:
  - Navigate to `add_trainee.php` and fill out the form to add a new trainee.

- **Listing Trainees**:
  - Visit `list_trainees.php` to view all registered trainees in a tabular format.

- **Editing Trainee Information**:
  - Click on "Edit" next to a trainee's record in the list to modify their details.

- **Deleting a Trainee**:
  - Click on "Delete" next to a trainee's record in the list to remove them from the database.

## Styling and Customization

- Modify `app/css/styles.css` to customize the look and feel of the web pages.
- Update templates (`header.php` and `footer.php`) in `app/templates/` for common header and footer content across pages.

## Contributing

Contributions are welcome! Feel free to fork the repository, make improvements, and submit pull requests.

## License

This project is licensed under the MIT License. See `LICENSE` for more information.

---

Feel free to customize this `README.md` further based on your specific project details, such as adding contact information, acknowledgments, or any additional features not covered here. This document serves as a comprehensive guide for setting up, using, and maintaining your trainee management web application.