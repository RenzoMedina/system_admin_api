# 📦 Administrative System API

Modular API for administrative resource management, developed in PHP with focus on backend best practices and deployment with Docker.

## 🚀 Main features

- Native PHP-based architecture
- Custom Docker container (backend-php:1.0)
- Environment variables managed with .env and docker-compose
- Integration with MySQL as database
- Configuration of ports and volumes for local development

## 🛠️ Technologies used

| Technology             | Main usage                                                               |
| ----------------- | ------------------------------------------------------------------ |
| PHP | Backend logic |
| PHP | Micro-framework for RESTful APIs |
| Medoo | Lightweight ORM for PHP database management |
| Docker  | Containerization and deployment |
| MySQL | Data persistence |
| GitHub Actions | Automated CI/CD |
| Azure DevOps | Task management and scheduling with Azure Boards |

## 📁 Structure

```mermaid
system_admin_api/
├─── app/
├─── core/
├─── routes/
├─── test/
│ ├─── index.php
│ ├─── .env
│ ├─── .htaccess
│ ├─── Dockerfile
│ └─── ...
└── README.md
```

## ⚙️ Quick Configuration

* Clones the repository

```bash
git clone https://github.com/RenzoMedina/system_admin_api.git
cd system_admin_api
```
*  Create your .env file in ./backend/.env:
```env
TOKEN=you token
DBNAME=sistema_administrable
DBTYPE=mysql
DBHOST=you host
DBUSER=you user
DBPASS=you user
```
## 🧪 Testing

```php
composer run-script tests
```
## 📚 Main Endpoint

| Method| Endpoint | Description |
|-----------|-----------|-----------|
| GET   | /api/users   | List all registered users   |
| GET   | /api/user/{id} | Get user data by ID   |
| POST   | /api/user   | Create a new user   |
| PUT   | /api/user/{id}   | LUpdate user data   |
| DELETE   | /api/user/{id}  | Remove a user by ID   |

## 👨‍💻 Autor

Renzo Steven Medina Olaya
Backend Developer transitioning into DevOps

