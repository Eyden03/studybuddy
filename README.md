# 📚 StudyBuddy

StudyBuddy is a web application that allows students to create, manage, and join study sessions. It is built using **PHP, MySQL, HTML, CSS, and XAMPP**.

---

## ✨ Features

- 👤 User Registration and Login
- 👨‍🎓 User Profile
- 📅 Create Study Sessions
- ✏️ Edit Study Sessions
- 📚 View Session Details
- 📂 My Sessions
- 🚪 Logout

---

## 📷 Screenshots |
Homepage | Login | My Sessions | 
|----------|-------|-------------| 
| <img width="1902" height="867" alt="image" src="https://github.com/user-attachments/assets/c41e9614-119c-4dc1-b12f-02d3a9c9ae67" />| <img width="1915" height="863" alt="image" src="https://github.com/user-attachments/assets/c976fbaf-8adc-49f2-818a-a7abafff4057" /> | <img width="1918" height="868" alt="image" src="https://github.com/user-attachments/assets/8a93ecb7-2585-4228-a370-98aed5040c3f" /> 
| **Create Session** | **Register** | **Profile** | 
|<img width="698" height="856" alt="image" src="https://github.com/user-attachments/assets/2565825b-a137-4292-9e7d-752a8100f97c" />|--------------|-------------|

---

## 📁 Folder Structure

```text
htdocs/finalproject/

├── assets/
│   └── css/
│       └── style.css
│
├── includes/
│   ├── auth.php
│   ├── config.php
│   ├── db.php
│   ├── helpers.php
│   ├── session_model.php
│   ├── sidebar.php
│   └── topbar.php
│
├── uploads/
│   └── avatars/
│
├── about.php
├── create_session.php
├── edit_profile.php
├── edit_session.php
├── home.php
├── index.php
├── login.php
├── logout.php
├── my_sessions.php
├── profile.php
├── register.php
├── session_details.php
└── README.md
```

---

## 🚀 Installation

1. Clone the repository.

```bash
git clone https://github.com/yourusername/studybuddy.git
```

2. Copy the project to:

```text
C:\xampp\htdocs\finalproject
```

3. Start **Apache** and **MySQL** in XAMPP.

4. Create a database named **studybuddy** in **phpMyAdmin** and import the SQL file.

5. Open your browser:

```text
http://localhost/finalproject
```

---

## ⚙️ Configuration

### Database Configuration

Open **`includes/config.php`** and update the database credentials if needed.

```php
$host = "localhost";
$username = "root";
$password = "";
$database = "studybuddy";
```

### Database Connection

The database connection is handled in:

```text
includes/db.php
```

Make sure the database name matches the one you created in **phpMyAdmin**.

---
---

## 🎨 Color Scheme

The application uses the following color palette:

```css
:root {
    --primary: #2563EB;      /* Blue */
    --secondary: #3B82F6;    /* Light Blue */
    --success: #22C55E;      /* Green */
    --warning: #F59E0B;      /* Orange */
    --danger: #EF4444;       /* Red */
    --background: #F8FAFC;   /* Light Gray */
    --surface: #FFFFFF;      /* White */
    --text: #1F2937;         /* Dark Gray */
}
```

---

## 🛠 Technologies Used

- PHP
- MySQL
- HTML
- CSS
- XAMPP

---

## 👨‍💻 Developers

- Aidhen Pocsidio
- Vince Elpedez
- Kate Cam
- Kesha Delo Santos
- John Paul Santos

---

## 📄 License

This project was developed for educational purposes.
