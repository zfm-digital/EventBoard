# EventBoard

## Setup

### 1. Clone the repository

```bash
git clone git@github.com:zfm-digital/EventBoard.git
cd EventBoard
```

### 2. Quick setup (recommended)

The project includes a single command that installs all dependencies, configures the environment, generates an app key, runs migrations, and builds frontend assets:

```bash
composer setup
```

### 3. Manual setup

If you prefer to run each step individually:

```bash
# Install PHP dependencies
composer install

# Copy environment file and generate app key
cp .env.example .env
php artisan key:generate

# Run database migrations (SQLite by default)
php artisan migrate

# Install frontend dependencies and build assets
npm install
npm run build
```

## Development

Start the full development stack (server, queue worker, log tail, and Vite dev server) with a single command:

```bash
composer dev
```

This runs concurrently:
- **Laravel server** at `http://localhost:8000`
- **Queue worker** for background jobs
- **Vite** for frontend HMR

## Tech Stack

- **Backend:** Laravel 13, Fortify (authentication), SQLite
- **Frontend:** React, Inertia.js, TypeScript, Tailwind CSS
- **UI Components:** Radix UI, shadcn/ui
- **Tooling:** Vite, ESLint, Prettier, Pint, PHPUnit