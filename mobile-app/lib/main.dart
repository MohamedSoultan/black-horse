import 'package:flutter/material.dart';
import 'package:flutter_localizations/flutter_localizations.dart';
import 'package:flutter_riverpod/flutter_riverpod.dart';
import 'core/routing/app_router.dart';
import 'core/theme/app_theme.dart';
import 'core/di/locale_provider.dart';import 'l10n/app_localizations.dart';

void main() => runApp(const ProviderScope(child: BlackHorseApp()));

class BlackHorseApp extends ConsumerWidget {
  const BlackHorseApp({super.key});
  @override
  Widget build(BuildContext context, WidgetRef ref){final locale=ref.watch(localeProvider);return MaterialApp.router(title:'Black Horse',theme:AppTheme.light,routerConfig:appRouter,debugShowCheckedModeBanner:false,locale:locale,supportedLocales:AppLocalizations.supportedLocales,localizationsDelegates:const [AppLocalizations.delegate,GlobalMaterialLocalizations.delegate,GlobalCupertinoLocalizations.delegate,GlobalWidgetsLocalizations.delegate]);}
}
