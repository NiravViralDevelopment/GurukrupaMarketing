# Gurukrupa Real Estate - Setup Guide

## Quick Start Guide

### 1. Prerequisites
Make sure you have the following installed:
- PHP 8.1 or higher
- Composer
- Node.js & NPM
- MySQL
- Git

### 2. Installation

```bash
# 1. Install PHP dependencies
composer install

# 2. Install Node.js dependencies
npm install

# 3. Copy environment file
cp .env.example .env

# 4. Generate application key
php artisan key:generate

# 5. Configure your database in .env file
# Update these values:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gurukrupa_real_estate
DB_USERNAME=root
DB_PASSWORD=your_password

# 6. Run migrations and seeders
php artisan migrate
php artisan db:seed

# 7. Create storage link for file uploads
php artisan storage:link

# 8. Build frontend assets
npm run build

# 9. Start the development server
php artisan serve
```

### 3. Access the Application

- **Frontend**: http://localhost:8000
- **Admin Panel**: http://localhost:8000/admin
- **Login**: http://localhost:8000/login

### 4. Default Admin Credentials

**Super Admin:**
- Email: admin@gurukrupa.com
- Password: password

**Admin:**
- Email: admin@example.com
- Password: password

## Development Setup

### For Development with Hot Reload

```bash
# Start Laravel server
php artisan serve

# In another terminal, start Vite for hot reload
npm run dev
```

### Database Reset

```bash
# Reset database and reseed
php artisan migrate:fresh --seed
```

### Clear Caches

```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

## File Structure Overview

```
GurukrupaMarketing/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/              # Admin panel controllers
│   │   │   ├── DashboardController.php
│   │   │   ├── ProjectController.php
│   │   │   ├── BlogController.php
│   │   │   ├── InquiryController.php
│   │   │   └── SettingController.php
│   │   └── Frontend/           # Frontend controllers
│   │       ├── HomeController.php
│   │       ├── ProjectController.php
│   │       ├── BlogController.php
│   │       ├── ContactController.php
│   │       └── AboutController.php
│   └── Models/                 # Eloquent models
│       ├── User.php
│       ├── Project.php
│       ├── ProjectImage.php
│       ├── Blog.php
│       ├── Inquiry.php
│       ├── Setting.php
│       └── Team.php
├── database/
│   ├── migrations/             # Database migrations
│   └── seeders/               # Database seeders
├── resources/views/
│   ├── admin/                 # Admin panel views
│   ├── frontend/              # Frontend views
│   ├── layouts/               # Layout templates
│   └── emails/                # Email templates
├── routes/
│   ├── web.php                # Main application routes
│   └── auth.php               # Authentication routes
└── public/                    # Public assets
```

## Key Features Implemented

### Frontend Features
- ✅ Responsive home page with hero section
- ✅ Project listings with filtering
- ✅ Individual project detail pages
- ✅ Blog/news section
- ✅ Contact form with inquiry management
- ✅ About page with team information
- ✅ Modern UI with Tailwind CSS

### Admin Features
- ✅ Dashboard with statistics
- ✅ Project management (CRUD)
- ✅ Blog post management
- ✅ Inquiry management
- ✅ Settings management
- ✅ Image upload functionality
- ✅ User authentication

### Database Features
- ✅ User management with roles
- ✅ Project management with categories
- ✅ Image galleries for projects
- ✅ Blog post system
- ✅ Contact inquiry system
- ✅ Settings management
- ✅ Team member management

## Customization Guide

### Changing Colors
Update `tailwind.config.js`:
```javascript
theme: {
  extend: {
    colors: {
      primary: '#D4AF37',    // Change this to your brand color
      secondary: '#1a1a1a',  // Change this to your secondary color
    }
  }
}
```

### Adding New Project Categories
1. Update the migration in `database/migrations/2024_01_01_000002_create_projects_table.php`
2. Update the Project model validation
3. Update the frontend filter options

### Adding New Settings
1. Add new setting in `database/seeders/SettingSeeder.php`
2. Update the admin settings form
3. Use `Setting::get('your_key')` in views

## Troubleshooting

### Common Issues

**1. Storage link not working**
```bash
php artisan storage:link
```

**2. Permission issues**
```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

**3. Database connection issues**
- Check your `.env` file database credentials
- Ensure MySQL is running
- Verify database exists

**4. Asset compilation issues**
```bash
npm install
npm run build
```

**5. Clear all caches**
```bash
php artisan optimize:clear
```

## Production Deployment

### Environment Variables for Production
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com

# Database
DB_CONNECTION=mysql
DB_HOST=your-db-host
DB_DATABASE=your-db-name
DB_USERNAME=your-db-user
DB_PASSWORD=your-db-password

# Mail (for contact form)
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-email
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@your-domain.com
MAIL_FROM_NAME="Gurukrupa Real Estate"
```

### Production Commands
```bash
# Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

# Build assets
npm run build
```

## Support

For any issues or questions:
- Check the Laravel documentation: https://laravel.com/docs
- Check the Tailwind CSS documentation: https://tailwindcss.com/docs
- Create an issue in the repository

---

**Happy coding! 🚀**
