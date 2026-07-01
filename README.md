# Production-Ready SaaS Application

A complete, enterprise-grade SaaS platform built with Laravel 12, React 19, and MySQL.

## 🚀 Features

### Core Features
- **JWT Authentication** with Refresh Tokens
- **Role-Based Access Control** (RBAC)
- **Three User Panels**: Admin, Vendor, Customer
- **Dashboard Analytics** with real-time metrics
- **REST API** with Swagger Documentation

### Business Features
- **Stripe Payment Integration** for subscriptions and one-time payments
- **Subscription Plans Management** with flexible pricing
- **Invoice Generation** with PDF export
- **Email Verification** system
- **Forgot Password** recovery flow
- **Activity & Audit Logs** for compliance

### Technical Features
- **Repository Pattern** architecture
- **Service Pattern** implementation
- **Comprehensive Exception Handling**
- **File Upload Management** with validation
- **Localization (i18n)** support
- **Dark Mode** support
- **Responsive UI** design
- **Docker** containerization
- **Unit & Feature Testing**
- **API Pagination, Sorting, Filtering**
- **Database Indexing** for performance

## 🛠 Tech Stack

### Backend
- **Laravel**: 12
- **PHP**: 8.4
- **Database**: MySQL 8.0
- **Cache**: Redis
- **API Documentation**: Swagger

### Frontend
- **React**: 19
- **Build Tool**: Vite
- **Language**: TypeScript
- **Styling**: Tailwind CSS
- **State Management**: Redux Toolkit
- **HTTP Client**: Axios

### Infrastructure
- **Docker** & Docker Compose
- **Nginx** web server
- **MySQL** 8.0
- **Redis** for caching

## 📁 Project Structure

```
saas-application/
├── backend/              # Laravel 12 Application
├── frontend/             # React 19 Application
├── docker/               # Docker Configuration
├── docs/                 # Documentation
└── README.md
```

## ⚡ Quick Start

### Prerequisites
- Docker & Docker Compose
- Git

### Installation

```bash
# Clone repository
git clone https://github.com/imappdeveloper/Sarkari-Kam-.git
cd Sarkari-Kam-

# Copy environment files
cp .env.example .env
cd backend && cp .env.example .env && cd ..
cd frontend && cp .env.example .env && cd ..

# Start Docker containers
docker-compose up -d

# Wait for MySQL to be healthy (check with: docker ps)
# Then install backend dependencies
docker-compose exec laravel composer install

# Generate Laravel key
docker-compose exec laravel php artisan key:generate

# Run migrations
docker-compose exec laravel php artisan migrate

# Seed database (optional)
docker-compose exec laravel php artisan db:seed

# Install frontend dependencies
docker-compose exec node npm install

# Access the application
# Backend API: http://localhost:8000
# Frontend: http://localhost:5173
# Swagger API Docs: http://localhost:8000/api/documentation
```

## 🔐 Default Credentials

After running seeders:

**Admin**
- Email: admin@saas.local
- Password: password

**Vendor**
- Email: vendor@saas.local
- Password: password

**Customer**
- Email: customer@saas.local
- Password: password

## 📖 Documentation

- [API Documentation](docs/API.md)
- [Database Schema](docs/DATABASE.md)
- [Installation Guide](docs/INSTALLATION.md)
- [Architecture](docs/ARCHITECTURE.md)
- [Authentication](docs/AUTHENTICATION.md)
- [Deployment](docs/DEPLOYMENT.md)

## 🧪 Testing

```bash
# Run all tests
docker-compose exec laravel php artisan test

# Run unit tests
docker-compose exec laravel php artisan test --testsuite=Unit

# Run feature tests
docker-compose exec laravel php artisan test --testsuite=Feature

# Generate coverage report
docker-compose exec laravel php artisan test --coverage
```

## 📝 Database Migrations

```bash
# Run migrations
docker-compose exec laravel php artisan migrate

# Rollback last batch
docker-compose exec laravel php artisan migrate:rollback

# Refresh database (warning: destructive)
docker-compose exec laravel php artisan migrate:refresh --seed
```

## 📋 Environment Configuration

### Backend (.env)
```
APP_NAME="SaaS Application"
APP_ENV=production
APP_DEBUG=false
DB_HOST=mysql
JWT_SECRET=your-secret-key
STRIPE_SECRET_KEY=your-stripe-key
```

### Frontend (.env)
```
VITE_API_URL=http://localhost:8000
VITE_APP_URL=http://localhost:5173
```

## 🔄 API Endpoints

### Authentication
- `POST /api/auth/register` - Register new user
- `POST /api/auth/login` - Login user
- `POST /api/auth/refresh` - Refresh JWT token
- `POST /api/auth/logout` - Logout user
- `POST /api/auth/forgot-password` - Send reset email
- `POST /api/auth/reset-password` - Reset password

### Users
- `GET /api/users` - List all users (Admin only)
- `GET /api/users/{id}` - Get user details
- `PUT /api/users/{id}` - Update user
- `DELETE /api/users/{id}` - Delete user (Admin only)

### Admin Panel
- `GET /api/admin/dashboard` - Admin dashboard analytics
- `GET /api/admin/users` - Manage users
- `GET /api/admin/roles` - Manage roles
- `GET /api/admin/permissions` - Manage permissions
- `GET /api/admin/audit-logs` - View audit logs

### Vendor Panel
- `GET /api/vendor/dashboard` - Vendor dashboard
- `GET /api/vendor/products` - Manage products
- `GET /api/vendor/orders` - View orders
- `GET /api/vendor/analytics` - Sales analytics
- `GET /api/vendor/payouts` - Payout history

### Customer Panel
- `GET /api/customer/dashboard` - Customer dashboard
- `GET /api/customer/products` - Browse products
- `GET /api/customer/cart` - Shopping cart
- `POST /api/customer/orders` - Place order
- `GET /api/customer/orders` - Order history

### Payments
- `POST /api/payments/process` - Process payment
- `GET /api/payments/history` - Payment history
- `POST /api/payments/create-payment-method` - Add payment method

### Subscriptions
- `GET /api/subscriptions/plans` - List subscription plans
- `POST /api/subscriptions/create` - Create subscription
- `GET /api/subscriptions` - Get user subscriptions
- `POST /api/subscriptions/{id}/upgrade` - Upgrade plan
- `POST /api/subscriptions/{id}/cancel` - Cancel subscription

### Invoices
- `GET /api/invoices` - List invoices
- `GET /api/invoices/{id}` - Get invoice details
- `GET /api/invoices/{id}/download` - Download invoice PDF

## 🚀 Deployment

See [Deployment Guide](docs/DEPLOYMENT.md) for production deployment instructions.

## 📄 License

MIT License - See LICENSE file for details

## 🤝 Support

For issues and questions, please create an issue on GitHub.

## 👥 Contributing

Contributions are welcome! Please follow the SOLID principles and Laravel/React best practices.
