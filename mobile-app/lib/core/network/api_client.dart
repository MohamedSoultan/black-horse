import 'package:dio/dio.dart';import '../config/app_config.dart';import 'auth_interceptor.dart';
class ApiClient { ApiClient():dio=Dio(BaseOptions(baseUrl:AppConfig.apiBaseUrl,connectTimeout:const Duration(seconds:15),receiveTimeout:const Duration(seconds:15)))..interceptors.add(AuthInterceptor()); final Dio dio; }
