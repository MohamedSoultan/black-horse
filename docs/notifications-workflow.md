# Notifications workflow

The `NotificationService` persists user notifications for provider decisions, request status changes, and admin communication. Delivery is intentionally in-app only in this phase; future push and email adapters can subscribe to the same service calls. Users can list their own notifications, read the unread count, and mark individual records read.
