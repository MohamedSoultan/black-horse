class AppException implements Exception { const AppException(this.message,{this.code}); final String message; final String? code; @override String toString()=>message; }
class NetworkException extends AppException { const NetworkException(super.message,{super.code}); }
