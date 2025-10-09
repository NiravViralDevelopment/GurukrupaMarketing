# Gurukrupa Real Estate Website

A complete Laravel-based real estate/construction company website with both frontend and admin backend.

## 🚀 Features

### Frontend
- **Home Page**: Hero section, featured projects, stats, latest news
- **About Page**: Company information and team members
- **Projects Page**: Filterable project listings with categories
- **Project Detail**: Individual project pages with galleries and specifications
- **Blog/News**: News and blog post listings
- **Contact Page**: Contact form with inquiry management

### Admin Panel
- **Dashboard**: Statistics and recent activity
- **Projects Management**: Full CRUD for projects with image galleries
- **Blog Management**: Create and manage blog posts
- **Inquiry Management**: Handle contact form submissions
- **Settings**: Site configuration and company information
- **User Management**: Admin user management

## 🛠️ Tech Stack

- **Backend**: Laravel 11
- **Frontend**: Blade Templates + Tailwind CSS
- **Database**: MySQL
- **Authentication**: Laravel Breeze
- **File Storage**: Laravel Storage (public/AWS S3)

## 📦 Installation

### Prerequisites
- PHP 8.1 or higher
- Composer
- Node.js & NPM
- MySQL
- Web server (Apache/Nginx)

### Setup Steps

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd GurukrupaMarketing
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database**
   Update `.env` file with your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=gurukrupa_real_estate
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```

6. **Run migrations and seeders**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

7. **Create storage link**
   ```bash
   php artisan storage:link
   ```

8. **Build assets**
   ```bash
   npm run build
   ```

9. **Start development server**
   ```bash
   php artisan serve
   ```

## 🔐 Default Admin Credentials

- **Email**: admin@gurukrupa.com
- **Password**: password
- **Role**: Super Admin

- **Email**: admin@example.com
- **Password**: password
- **Role**: Admin

## 📁 Project Structure

```
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/          # Admin panel controllers
│   │   └── Frontend/       # Frontend controllers
│   └── Models/             # Eloquent models
├── database/
│   ├── migrations/         # Database migrations
│   └── seeders/           # Database seeders
├── resources/views/
│   ├── admin/             # Admin panel views
│   ├── frontend/          # Frontend views
│   └── layouts/           # Layout templates
└── routes/
    ├── web.php            # Main routes
    └── auth.php           # Authentication routes
```

## 🎨 Customization

### Colors
The website uses a golden color scheme. To change colors, update the Tailwind config:

```javascript
// tailwind.config.js
theme: {
  extend: {
    colors: {
      primary: '#D4AF37',    // Golden
      secondary: '#1a1a1a',  // Dark
    }
  }
}
```

### Settings
Admin can update site settings through the admin panel:
- Site name and description
- Contact information
- Social media links
- Company logo

## 📱 Responsive Design

The website is fully responsive and works on:
- Desktop (1200px+)
- Tablet (768px - 1199px)
- Mobile (320px - 767px)

## 🚀 Deployment

### Production Setup

1. **Environment Configuration**
   ```bash
   # Set production environment
   APP_ENV=production
   APP_DEBUG=false
   
   # Configure database
   DB_CONNECTION=mysql
   DB_HOST=your-db-host
   DB_DATABASE=your-db-name
   DB_USERNAME=your-db-user
   DB_PASSWORD=your-db-password
   ```

2. **Optimize for production**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   php artisan optimize
   ```

3. **Build assets**
   ```bash
   npm run build
   ```

### File Storage
For production, consider using AWS S3 or similar cloud storage:

```env
FILESYSTEM_DISK=s3
AWS_ACCESS_KEY_ID=your-key
AWS_SECRET_ACCESS_KEY=your-secret
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=your-bucket
```

## 🔧 Development

### Adding New Features

1. **Create Migration**
   ```bash
   php artisan make:migration create_new_table
   ```

2. **Create Model**
   ```bash
   php artisan make:model NewModel
   ```

3. **Create Controller**
   ```bash
   php artisan make:controller Admin/NewController
   ```

4. **Add Routes**
   Update `routes/web.php` with new routes

### Database Seeding
To add more demo data:

```bash
php artisan db:seed --class=YourSeeder
```

## 📞 Support

For support and questions:
- Email: info@gurukrupa.com
- Phone: +91 9876543210

## 📄 License

This project is licensed under the MIT License.

---

**Built with ❤️ using Laravel 11 and Tailwind CSS**
