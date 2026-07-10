# Smart Health Hub

A full-stack healthcare portal supporting five distinct user roles — Patient, Doctor, Admin, Health Admin, and Pharmacist — with role-based dashboards, appointment scheduling, e-prescriptions, health records, a symptom checker, and real-time in-app chat between patients and providers.

**Live demo:** https://pavannerella35.github.io/finalproject/

## Demo accounts

| Role | Email | Password |
|---|---|---|
| Patient | patient2test@example.com | Test@1234 |
| Doctor | doctor2test@example.com | Test@1234 |
| Admin | admin2test@example.com | Test@1234 |
| Health Admin | healthadmin2test@example.com | Test@1234 |
| Pharmacist | pharmacist2test@example.com | Test@1234 |

> The backend runs on a free-tier host that spins down after periods of inactivity, so the first request after a while may take 30–60 seconds to respond while it wakes up.

## Features

- **Patient** — symptom checker with guidance, medication reminders, appointment booking, health record history, prescription tracking, and live chat with care providers.
- **Doctor** — appointment queue with confirm/decline actions, patient health records, prescription authoring, and an analytics dashboard (patient load, prescription trends over time).
- **Admin** — user and doctor account management, platform-wide analytics dashboard, and chat.
- **Health Admin** — facility/ward capacity management, staff records, and compliance rule tracking (e.g. HIPAA).
- **Pharmacist** — medication history lookup and dispensation tracking.
- **Real-time chat** across all roles, powered by Socket.io.

## Architecture

This project is deployed entirely on free-tier infrastructure across three providers:

| Layer | Stack | Hosted on |
|---|---|---|
| Frontend | React 18 (Create React App), React Router | GitHub Pages, built and deployed via GitHub Actions |
| API | Laravel 8 (PHP 8.1), Dockerized | Render (Docker web service) |
| Real-time chat | Node.js + Socket.io | Render (Node web service) |
| Database | PostgreSQL | Neon (serverless Postgres) |

```
React (GitHub Pages)
   ├── REST calls ──> Laravel API (Render, Docker) ──> PostgreSQL (Neon)
   └── WebSocket  ──> Node/Socket.io chat server (Render)
```

Pushing to `master` automatically rebuilds and redeploys the frontend via GitHub Actions (`.github/workflows/deploy-react.yml`). The backend and chat server redeploy automatically on push through Render's GitHub integration.

## Project structure

```
Phase3 Project files/
├── react-code/     # React frontend (CRA)
├── Laravel/        # PHP/Laravel REST API
└── chat-node/      # Socket.io chat server
```

## Local development

**Frontend**
```bash
cd "Phase3 Project files/react-code"
npm install
npm start
```

**Backend**
```bash
cd "Phase3 Project files/Laravel"
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

**Chat server**
```bash
cd "Phase3 Project files/chat-node"
npm install
node index.js
```

## Tech highlights

- Custom Docker image for the Laravel API (PHP 8.1 + Apache, with Apache rewrite/AllowOverride configured for Laravel's routing).
- GitHub Pages SPA deep-link support via the rafgraph 404-redirect technique, with `PUBLIC_URL`-aware routing throughout the React app.
- CI/CD via GitHub Actions for the frontend; Render's Git-based auto-deploy for backend services.
- Zero paid infrastructure — GitHub Pages, Render free tier, and Neon's free Postgres tier.

## Contributors

Originally built as a team project by Pavan Nerella, Matthew Coopman, Pranay Karna, Lokeshwar Kodipunjula, and Sai Pasupuleti. Deployment infrastructure, bug fixes, and this version of the app were subsequently reworked and maintained by [Pavan Nerella](https://github.com/pavannerella35).
