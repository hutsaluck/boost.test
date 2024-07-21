## Gold Mining App

This is a simple web application to manage data about countries, companies, and gold mining. The application allows you to view and manage countries and companies, and generate reports on gold mining activities.

### Requirements

- PHP 7+
- MySQL 5.6+
- Composer
- Node.js
- NPM

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/hutsaluck/boost.test.git
   cd boost.test
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies:**
   ```bash
   npm install
   ```

4. **Create a copy of the `.env` file:**
   ```bash
   cp .env.example .env
   ```

5. **Generate the application key:**
   ```bash
   php artisan key:generate
   ```

6. **Set up the database:**
    - Create a database and update the `.env` file with your database credentials.

7. **Run the migrations:**
   ```bash
   php artisan migrate --seed
   ```

8. **Serve the application:**
   ```bash
   php artisan serve
   ```

9. **Build the frontend assets:**
   ```bash
   npm run dev
   ```

### API Endpoints

- **Countries**
    - `GET /api/countries` - Retrieve all countries
    - `POST /api/countries` - Create a new country
    - `PUT /api/countries/{id}` - Update a country
    - `DELETE /api/countries/{id}` - Delete a country

- **Companies**
    - `GET /api/companies` - Retrieve all companies
    - `POST /api/companies` - Create a new company
    - `PUT /api/companies/{id}` - Update a company
    - `DELETE /api/companies/{id}` - Delete a company

- **Reports**
    - `GET /api/report?month={month}` - Generate a report for a specific month
    - `GET /api/generate-data` - Generate random data for the last 6 months

### Frontend

The frontend is built using Vue 3 and Tailwind CSS. It consists of three main views:

- **Countries.vue** - Manage countries
- **Companies.vue** - Manage companies
- **Leaders.vue** - View the report of countries that exceeded their planned gold mining weight

### Example Data

Sample data is provided in the database seeders:

- **Countries**
    - Canada (10 T)
    - USA (1 T)
    - Germany (8 T)
    - Australia (900 kg)

- **Companies**
    - Goldcorp (goldcorp@mail.com, Canada)
    - Barrick Gold (barrick@gold.com, Canada)
    - Newmont Mining (newmont@mining.com, USA)
    - Polyus Gold (polyus@gold.com, Germany)
    - Newcrest Mining (newcrest@mining.com, Australia)

### How to Use

1. **Navigate to the application in your browser:**
   ```bash
   http://localhost:8000
   ```

2. **Manage Countries:**
    - Add, edit, and delete countries.

3. **Manage Companies:**
    - Add, edit, and delete companies associated with countries.

4. **Generate Data and View Reports:**
    - Generate random mining data for the last 6 months.
    - Select a month and view the report of countries that exceeded their planned gold mining weight.

### Notes

- The application uses a JSON REST API for all backend interactions.
- Tailwind CSS is used for styling the frontend.
- Vue Router is used for navigating between different views.

### License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

### Contributions

Contributions are welcome! Please fork this repository and submit a pull request for any enhancements or bug fixes.

---

This README provides an overview of the Gold Mining App, including setup instructions, API endpoints, and usage information. If you encounter any issues or have questions, feel free to open an issue on GitHub.
