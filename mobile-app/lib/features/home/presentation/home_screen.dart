import 'package:flutter/material.dart';
import 'package:go_router/go_router.dart';
import '../../../core/presentation/ui_components.dart';

class HomeScreen extends StatelessWidget {
  const HomeScreen({super.key});
  @override
  Widget build(BuildContext context) => Scaffold(
        appBar: AppBar(title: const Text('BLACK HORSE'), actions: [
          IconButton(onPressed: () => context.push('/notifications'), icon: const Icon(Icons.notifications_none)),
        ]),
        body: ListView(padding: const EdgeInsets.all(20), children: [
          Text('A finer way forward.', style: Theme.of(context).textTheme.displaySmall),
          const SectionHeader('Discover'),
          _action(context, 'Services', '/services'),
          _action(context, 'Verified providers', '/providers'),
          _action(context, 'Success stories', '/portfolio'),
          _action(context, 'My profile', '/profile'),
        ]),
      );
  Widget _action(BuildContext context, String title, String path) => LuxuryCard(
        onTap: () => context.push(path),
        child: Row(children: [Expanded(child: Text(title, style: Theme.of(context).textTheme.titleLarge)), const Icon(Icons.arrow_forward)]),
      );
}
