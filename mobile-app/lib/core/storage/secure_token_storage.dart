import 'package:flutter_secure_storage/flutter_secure_storage.dart';
import '../constants/app_constants.dart';

class SecureTokenStorage {
  const SecureTokenStorage();

  static const _storage = FlutterSecureStorage();

  Future<void> saveAccessToken(String value) async {
    await _storage.write(
      key: AppConstants.accessTokenKey,
      value: value,
    );
  }

  Future<String?> getAccessToken() async {
    return _storage.read(
      key: AppConstants.accessTokenKey,
    );
  }

  Future<void> saveRefreshToken(String value) => _storage.write(key: AppConstants.refreshTokenKey, value: value);
  Future<String?> readAccessToken() => getAccessToken();
  Future<String?> readRefreshToken() => _storage.read(key: AppConstants.refreshTokenKey);
  Future<void> write(String key, String value) => _storage.write(key: key, value: value);
  Future<String?> read(String key) => _storage.read(key: key);

  Future<void> clear() async {
    await _storage.deleteAll();
  }
}
