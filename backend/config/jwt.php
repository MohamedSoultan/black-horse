<?php
return ['secret' => env('JWT_SECRET'), 'ttl' => (int) env('JWT_TTL', 15), 'refresh_ttl' => (int) env('JWT_REFRESH_TTL', 43200), 'algo' => 'HS256', 'required_claims' => ['iss','iat','exp','nbf','sub','jti']];
