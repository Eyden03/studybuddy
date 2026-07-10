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

## 🚀 Setup

### Prerequisites

- XAMPP with Apache and MySQL running
- A web browser
### Steps
#### 1. Clone or download the repository

```bash
git clone https://github.com/yourusername/studybuddy.git
```

#### 2. Move the project to `htdocs`

Copy the **studybuddy** folder into:

```text
C:\xampp\htdocs\finalproject\
```

#### 3. Set up the database

- Open **http://localhost/phpmyadmin**
- Create a database named **studybuddy**
- Import your SQL file (if applicable)

#### 4. Configure the database

Open **`includes/config.php`** and verify the database credentials:

```php
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'studybuddy');
define('DB_USER', 'root');
define('DB_PASS', '');
```

#### 5. Open the website

```text
http://localhost/finalproject/
```

---

## ⚙️ Configuration

### Database Credentials

Open **`includes/config.php`** and update the database credentials if needed.

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'studybuddy');
define('DB_USER', 'root');
define('DB_PASS', '');
```

### Color Scheme

The application uses the following color palette:

```css
:root {
    --primary: #D7FF4A;      /* Lime Green (Buttons & Active Menu) */
    --secondary: #8B7CF6;    /* Purple (Profile Avatar) */
    --accent: #FF6B57;       /* Coral (Session Labels) */
    --background: #F8F5EE;   /* Off-White Background */
    --surface: #FFFFFF;      /* Cards */
    --sidebar: #17171F;      /* Dark Sidebar */
    --text: #1E1E2F;         /* Primary Text */
    --text-light: #7A7A8C;   /* Secondary Text */
    --border: #E5E5E5;       /* Card Borders */
}
```


---

## 🛠 Tech Stack

| Layer | Technology |
|--------|------------|
| Backend | PHP 8.x |
| Database | MySQL |
| Server | Apache via XAMPP |
| Frontend | HTML5 + CSS3 |
| Styling | CSS3 |
| Fonts | Inter (Google Fonts) |

---


## 📄 License

This project was developed for educational purposes for our final proect.
