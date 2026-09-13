# Admin Dashboard

The React/Vite dashboard uses the Laravel `/api/v1` contract. JWT access tokens are stored in browser storage for the MVP, attached by the API client, and cleared on a 401 or logout. Routes are protected by authentication and the Roles page additionally requires `SUPER_ADMIN`.

Run with `npm install && npm run dev` in `admin-dashboard`, or through the root Docker Compose setup. Management pages intentionally use the existing backend endpoints and show loading, empty, and error states.
