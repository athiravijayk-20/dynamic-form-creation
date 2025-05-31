# Dynamic Form Creation Project

This project is a **dynamic form builder** developed with Laravel and SQLite as the backend database. It uses **FormBuilder.js** on the frontend to allow creating, editing, showing, and deleting forms dynamically, with data operations dependent on the selected country.

---

## ✨ Features

- **Dynamic Form Creation**: Build custom forms with drag-and-drop using FormBuilder.js.
- **CRUD Operations**: Create, edit, view, and delete forms.
- **Country-Based Logic**: Forms can be customized and filtered based on the selected country.
- **SQLite Database**: Lightweight database management using SQLite.
- **Editable Labels**: Modify field labels dynamically after form creation.
- **Bootstrap UI**: Responsive and user-friendly interface using Bootstrap.
- **AJAX Integration**: Smooth user experience with asynchronous requests.

---

## 🧰 Technologies Used

- Laravel (PHP Framework)
- SQLite (Database)
- FormBuilder.js (Drag-and-drop form builder)
- Bootstrap (UI Framework)
- AJAX (for smooth interactivity)

---

## 🛠️ How It Works

1. User selects a country.
2. Forms can be created, edited, or filtered based on the selected country.
3. All form fields are editable, including labels.
4. Data is saved in a local SQLite database.

---

## 🚀 Getting Started

Follow these steps to run the project locally:

### 1. Clone the repository

```bash
git clone https://github.com/athiravijayk-20/dynamic-form-creation.git
cd dynamic-form-creation
2. Install dependencies with Composer
Make sure Composer is installed, then run:


composer install
Or update packages if needed:


composer update
3. Set up environment variables
Copy the example .env file:


cp .env.example .env
Update your .env file for SQLite:


DB_CONNECTION=sqlite
DB_DATABASE=/absolute/full/path/to/database/database.sqlite
Replace /absolute/full/path/to/... with the actual full path on your system (e.g., C:/xampp/htdocs/dynamic_form/database/database.sqlite on Windows).

4. Create the SQLite database file

touch database/database.sqlite
On Windows, you can manually create the file in your file explorer inside the database/ folder.

5. Generate the application key

php artisan key:generate
6. Run database migrations

php artisan migrate
7. Start the Laravel development server

php artisan serve
Now the app will be available at:
👉 http://127.0.0.1:8000