import 'package:flutter_riverpod/flutter_riverpod.dart';import '../network/api_client.dart';import '../storage/secure_token_storage.dart';
final apiClientProvider=Provider<ApiClient>((_)=>ApiClient());final secureTokenStorageProvider=Provider<SecureTokenStorage>((_)=>const SecureTokenStorage());
