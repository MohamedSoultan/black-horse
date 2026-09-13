import 'notification_entity.dart';abstract interface class NotificationRepository{Future<List<NotificationEntity>>list();Future<int>unreadCount();Future<NotificationEntity>markRead(String id);}
