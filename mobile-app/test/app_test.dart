import 'package:flutter/material.dart';
import 'package:flutter_test/flutter_test.dart';
import 'package:flutter_riverpod/flutter_riverpod.dart';
import 'package:black_horse/main.dart';

void main() {
  testWidgets('app starts on splash', (tester) async {
    await tester.pumpWidget(const ProviderScope(child: BlackHorseApp()));
    expect(find.byType(MaterialApp), findsOneWidget);
  });
}
