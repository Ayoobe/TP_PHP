# INSAT Tickets - RSVP Event Reservation System

Insat Tickets is a web-based event reservation system designed to simplify event management and RSVP processes. It provides features for users to reserve events, search for events, manage their cart, and more. Additionally, it offers administrative functionalities such as order management(confirm cash payment), user management, updating the events list, and admin account management.

## Features

### For Users:
- **Event Reservation:** Users can easily reserve events they are interested in attending.
- **Event Searching:** Users can search for events based on various criteria such as date, location, category, etc.
- **Cart Management:** Users can manage their cart, view selected events, and proceed with the reservation process.

### For Admins:
- **Event Management:** Admins can view add new events to the database (including their names and descirpiton ) and delete existing ones.
- **Order Management:** Admins can see orders that user's have confirmed and set the payment status for these orders.
- **User Management:** Admins can manage user accounts, including creating, updating, and deleting user accounts.
- **Admin Account Management:** Admins have access to manage by adding and deleting other admin accounts.

## Technologies Used
- PHP: Backend development
- MySQL: Database management
- HTML/CSS/JavaScript: Frontend development
- Composer: Dependency management
- PHPMailer: For sending emails

## Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/Ayoobe/TP_PHP.git
2. Install PHPMailer using Composer:
    ```bash
    composer install
3. Start the PHP development server:
    ```bash
    php -S localhost:8000
4. Access the application through your web browser at http://localhost:8000.
5. Make sure to configure the database connection in the PHP files as needed.