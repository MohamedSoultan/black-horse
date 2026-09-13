# Database additions: Provider ecosystem

Provider migrations create `provider_categories`, `provider_applications`, `providers`, and `provider_media`, with UUID relationships to users and indexed application/provider statuses.

Service migrations create `service_categories`, `services`, and `service_media`. Services and categories use soft deletes where applicable.

Portfolio migrations create `portfolio_categories`, `portfolio_items`, and `portfolio_media`; portfolio items and categories support soft deletion.

Request migrations create `requests` and `request_assignments`, preserving assignment history and linking optional services/providers/users.

Notifications are stored in `notifications` with UUIDs, JSON metadata, read timestamps, and a user/read index.
