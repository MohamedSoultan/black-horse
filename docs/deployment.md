# Black Horse deployment

## Required configuration

Backend production environment must define `APP_ENV=production`, `APP_DEBUG=false`, a unique `APP_KEY`, a unique `JWT_SECRET`, `APP_URL`, PostgreSQL connection variables, `CORS_ALLOWED_ORIGINS`, and S3 credentials (`FILESYSTEM_DISK=s3`, `AWS_*`). Never commit `.env` files.

The dashboard requires `VITE_API_BASE_URL` at build time. Flutter requires `API_BASE_URL` through `--dart-define` or the Codemagic/GitHub Actions secret.

## Docker deployment

1. Copy `.env.example` to `.env` and replace every placeholder with production values.
2. Set `API_BASE_URL` to the public API URL and `CORS_ALLOWED_ORIGINS` to the dashboard origin.
3. Run `docker compose build` and `docker compose up -d`.
4. The backend container caches configuration, caches routes, and runs migrations before serving HTTP.
5. Put TLS termination and a domain in front of ports 8000 and 5173; restrict PostgreSQL ingress to the application network.

## GitHub Actions

Store `API_BASE_URL` as a repository secret for the mobile workflow. Build and deploy backend/dashboard images from the production branch using the deployment platform's container registry, then run `docker compose pull && docker compose up -d` on the VPS.

## Codemagic

Connect the repository, select `mobile-app/codemagic.yaml`, set `API_BASE_URL` as a secured environment variable, and configure Android signing/iOS certificates in Codemagic. The workflows run `flutter analyze`, `flutter test`, and release builds.
