import 'auth_user.dart';class AuthSession{const AuthSession({required this.accessToken,required this.refreshToken,required this.user});final String accessToken,refreshToken;final AuthUser user;}
