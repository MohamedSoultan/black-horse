# Portfolio workflow

Admins create portfolio categories and success-story items, attach media, then publish items by setting `status=ACTIVE`. Public endpoints return only active items and support category, keyword, and pagination filters. Deletes are soft deletes; media belongs to the parent item and is removed with it.
