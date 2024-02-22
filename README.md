<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Rotas da API

A seguir estão as principais rotas da API, juntamente com seus métodos e controladores correspondentes.

## Autenticação e Usuários

- **Registro de Usuário:**
  - `POST` `/api/register` - `Auth\RegisteredUserController@store`

- **Login:**
  - `POST` `/api/login` - `Auth\AuthenticatedSessionController@store`

- **Logout:**
  - `POST` `/api/logout` - `Auth\AuthenticatedSessionController@destroy`

- **Usuários:**
  - `GET|HEAD` `/api/user` - `UserController@index`
  - `POST` `/api/user` - `UserController@store`
  - `GET|HEAD` `/api/user/{user}` - `UserController@show`
  - `PUT|PATCH` `/api/user/{user}` - `UserController@update`
  - `DELETE` `/api/user/{user}` - `UserController@destroy`

## Salões

- **Listar Salões:**
  - `GET|HEAD` `/api/salon` - `SalonController@index`

- **Detalhes do Salão:**
  - `GET|HEAD` `/api/salon/{salon}` - `SalonController@show`

- **Registrar Salão:**
  - `POST` `/api/salon` - `SalonController@store`

- **Atualizar Salão:**
  - `PUT|PATCH` `/api/salon/{salon}` - `SalonController@update`

- **Excluir Salão:**
  - `DELETE` `/api/salon/{salon}` - `SalonController@destroy`

## Autenticação e Verificação de E-mail

- **Enviar Notificação de Verificação de E-mail:**
  - `POST` `/api/email/verification-notification` - `Auth\EmailVerificationNotificationController@store`

- **Verificação de E-mail:**
  - `GET|HEAD` `/api/verified` - `Auth\VerifyEmailController@show`
  - `GET|HEAD` `/api/verify-email/{id}/{hash}` - `Auth\VerifyEmailController`

## Senha e Recuperação de Conta

- **Esqueceu a Senha:**
  - `GET|HEAD` `/api/forgot-password` - `Auth\NewPasswordController@show`
  - `POST` `/api/forgot-password` - `Auth\PasswordResetLinkController@store`

- **Redefinir Senha:**
  - `POST` `/api/reset-password` - `Auth\NewPasswordController@store`

## Health Check e Configuração

- **Health Check:**
  - `GET|HEAD` `/_ignition/health-check` - `Spatie\LaravelIgnition\HealthCheckController`

- **Configuração Atualizar:**
  - `POST` `/_ignition/update-config` - `Spatie\LaravelIgnition\UpdateConfigController`

## Ignição

- **Executar Solução Ignição:**
  - `POST` `/_ignition/execute-solution` - `Spatie\LaravelIgnition\ExecuteSolutionController`

## Sanctum e Cookies CSRF

- **Obter Cookie CSRF:**
  - `GET|HEAD` `/sanctum/csrf-cookie` - `Laravel\Sanctum\CsrfCookieController@show`

## Verificação de E-mail

- **Mostrar Página de Verificação de E-mail:**
  - `GET|HEAD` `/email/verification-notification` - `Auth\EmailVerificationNotificationController@store`

- **Verificar E-mail:**
  - `GET|HEAD` `/verify-email/{id}/{hash}` - `Auth\VerifyEmailController`

---

*Nota: Certifique-se de consultar a documentação completa para obter detalhes sobre parâmetros e resposta esperada.*
