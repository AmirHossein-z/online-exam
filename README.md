# Online Exam System (آزمون آنلاین)

A full-featured web application for creating, managing, and taking online exams.
This project provides an admin panel for instructors and an exam interface for students, built with clean architecture and scalable features.

✨ Features

👨‍🏫 For Admin / Teacher

Create, edit, and delete exams
Add questions with multiple-choice answers
Define exam duration and availability
Manage students
View exam results and students’ scores
Dashboard with analytics

👨‍🎓 For Students

Register / Login
Take available exams
Timer-based exam environment
Submit answers securely
View results (if allowed)
---

🛠️ Tech Stack

Backend: Laravel
Frontend: Blade templates / HTML / CSS / JS
Database: MySQL
Authentication: Laravel Auth
Other: Eloquent ORM, MVC architecture, RESTful routes

📂 Project Structure

Online-Exam/
├── app/
│   ├── Http/
│   ├── Models/
│   └── ...
├── resources/
│   └── views/
├── public/
├── database/
│   └── migrations/
└── ...
---

🚀 Installation

1️⃣ Clone the repository
git clone https://github.com/AmirHossein-z/online-exam.git
cd online-exam

2️⃣ Install dependencies
composer install
npm install
npm run dev

3️⃣ Create .env file
cp .env.example .env
Set database name, user, and password inside .env.

4️⃣ Generate app key
php artisan key:generate

5️⃣ Run migrations
php artisan migrate

6️⃣ Start the server
php artisan serve

---

🧪 How to Use

⭐ Admin Panel

1. Login as admin
2. Create exams
3. Add questions & answers
4. Publish the exam
5. Monitor results

⭐ Student Workflow

1. Register & login
2. See available exams
3. Start exam (timer begins)
4. Submit answers
5. View score (if allowed)
---
https://github.com/AmirHossein-z/online-exam

<!--## Demo
For see demo of project you can going to this post.
(https://hireza.ir/projects/online-exam/auth/login)

Login test credentials for professor and student
username: test@hireza.ir
password: 123456
-->

## Authors
-   [@Amirhossein_Zareian](https://github.com/AmirHossein-z)
-   [@Reza_Dehghani](https://github.com/reza-dehghani)
<a href="https://github.com/amirhossein-z/online-exam/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=amirhossein-z/online-exam" />
</a>

Made with [contrib.rocks](https://contrib.rocks).

## 📝 Contributing
Contributions are always welcome!

Please set pull request for any recommendations and bugs in project!

## License

[MIT](https://choosealicense.com/licenses/mit/)
