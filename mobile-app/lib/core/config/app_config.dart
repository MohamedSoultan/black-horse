class AppConfig { const AppConfig._(); static const apiBaseUrl=String.fromEnvironment('API_BASE_URL'); static const environment=String.fromEnvironment('APP_ENV',defaultValue:'development'); }
