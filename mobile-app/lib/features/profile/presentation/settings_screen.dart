import 'package:flutter/material.dart';
import 'package:flutter_riverpod/flutter_riverpod.dart';
import '../../../core/di/locale_provider.dart';
import '../../../l10n/app_localizations.dart';
import '../../auth/presentation/auth_providers.dart';

class SettingsScreen extends ConsumerWidget {
  const SettingsScreen({super.key});
  @override
  Widget build(BuildContext context, WidgetRef ref) {
    final l = AppLocalizations.of(context);
    final current = ref.watch(localeProvider);
    return Scaffold(
      appBar: AppBar(title: Text(l.settings)),
      body: ListView(padding: const EdgeInsets.all(20), children: [
        Text(l.language, style: Theme.of(context).textTheme.titleLarge),
        const SizedBox(height: 8),
        DropdownButtonFormField<Locale>(
          initialValue: current,
          items: [
            DropdownMenuItem(value: const Locale('ar'), child: Text(l.arabic)),
            DropdownMenuItem(value: const Locale('en'), child: Text(l.english)),
          ],
          onChanged: (value) { if (value != null) ref.read(localeProvider.notifier).setLocale(value); },
        ),
        const SizedBox(height: 24),
        ListTile(title: Text(l.logout), onTap: () => ref.read(authSessionProvider.notifier).logout()),
      ]),
    );
  }
}
