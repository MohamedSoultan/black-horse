# Black Horse MVP

Phase 0 foundation for the Black Horse mobile app, Laravel API, React admin dashboard, and PostgreSQL infrastructure.

Business modules and authentication are intentionally deferred to Phase 1.

## Local startup

1. Copy `.env.example` to `.env`.
2. Run `docker compose up --build`.
3. API health check: `http://localhost:8000/api/v1/health`.
4. Admin development shell: `http://localhost:5173`.

Flutter requires the Flutter SDK and can be started from `mobile-app` with `flutter pub get` and `flutter run`.

