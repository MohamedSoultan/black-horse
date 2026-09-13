# Black Horse MVP demo guide

## Backend and database

From `backend`, install dependencies, copy `.env.example` to `.env`, set PostgreSQL values, then run:

```bash
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve --host=0.0.0.0 --port=8000
```

The API health endpoint is `GET /api/v1/health`.

## Admin dashboard

```bash
cd admin-dashboard
npm install
npm run dev
```

Open `http://localhost:5173`.

Demo admin credentials: `+201000000002` / `Password1`.

## Mobile app

```bash
cd mobile-app
flutter pub get
flutter run --dart-define=API_BASE_URL=http://localhost:8000/api/v1
```

Use a device/emulator that can reach the host machine. Demo customer: `+201000000001` / `Password1`. Demo provider: `+201000000003` / `Password1`.

## Journey

Open the app, register or log in, browse Services, Providers, and Success Stories, open details, create a service request, view My Requests and its status, open Notifications, switch language in Settings if desired, and log out. The admin journey is login → Dashboard → Users/Providers/Services/Portfolio/Requests → update or assign a request.

## Demo limitations

OTP delivery is the development provider, media uses placeholder URLs, FCM push is not configured, and the mobile build must be run on a Flutter-enabled workstation.
