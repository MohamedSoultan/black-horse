# Mobile cloud builds

The mobile app requires Flutter 3.47.4 and Dart 3.13. Build-time configuration is supplied with Dart defines; no API URL is embedded in source.

```bash
cd mobile-app
flutter pub get
flutter analyze
flutter test
flutter run --dart-define-from-file=.env.dev.json.example
flutter build apk --release --dart-define=API_BASE_URL=https://api.example.com/api/v1
flutter build ios --release --no-codesign --dart-define=API_BASE_URL=https://api.example.com/api/v1
```

For a physical device, set `API_BASE_URL` to a reachable HTTPS host or LAN address. CI should expose `API_BASE_URL` as a secret. Codemagic uses `codemagic.yaml`; GitHub Actions uses `API_BASE_URL` repository secret.
