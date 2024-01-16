<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Rotas da API

### Autenticação

- **Registrar Usuário:**
  - Método: `POST`
  - Endpoint: `/api/register`
  - Controlador: `Auth\RegisteredUserController@store`

- **Login:**
  - Método: `POST`
  - Endpoint: `/api/login`
  - Controlador: `Auth\AuthenticatedSessionController@store`

- **Logout:**
  - Método: `POST`
  - Endpoint: `/api/logout`
  - Controlador: `Auth\AuthenticatedSessionController@destroy`

### Gerenciamento de Senha

- **Esqueceu a Senha - Enviar E-mail de Redefinição:**
  - Método: `POST`
  - Endpoint: `/api/forgot-password`
  - Controlador: `Auth\PasswordResetLinkController@store`

- **Redefinir Senha - Mostrar Formulário:**
  - Método: `GET`
  - Endpoint: `/api/forgot-password`
  - Controlador: `Auth\NewPasswordController@show`

- **Redefinir Senha - Armazenar Nova Senha:**
  - Método: `POST`
  - Endpoint: `/api/reset-password`
  - Controlador: `Auth\NewPasswordController@store`

### Verificação de E-mail

- **Enviar Notificação de Verificação de E-mail:**
  - Método: `POST`
  - Endpoint: `/api/email/verification-notification`
  - Controlador: `Auth\EmailVerificationNotificationController@store`

- **Verificar E-mail:**
  - Método: `GET`
  - Endpoint: `/api/verify-email/{id}/{hash}`
  - Controlador: `Auth\VerifyEmailController`

- **Mostrar Página de E-mail Verificado:**
  - Método: `GET`
  - Endpoint: `/api/verified`
  - Controlador: `Auth\VerifyEmailController@show`

### Salon

- **Registrar Salão:**
  - Método: `POST`
  - Endpoint: `/api/register-salon`
  - Controlador: `SalonController@store`

### Usuário

- **Detalhes do Usuário Autenticado:**
  - Método: `GET`
  - Endpoint: `/api/user`

---

## Laravel Sanctum

- **Obter Cookie CSRF:**
  - Método: `GET`
  - Endpoint: `/sanctum/csrf-cookie`
  - Controlador: `Laravel\Sanctum\CsrfCookieController@show`

---

## Laravel Ignition

- **Executar Solução Ignition:**
  - Método: `POST`
  - Endpoint: `/_ignition/execute-solution`
  - Controlador: `Spatie\LaravelIgnition\ExecuteSolutionController`

- **Verificar Status de Saúde Ignition:**
  - Método: `GET`
  - Endpoint: `/_ignition/health-check`
  - Controlador: `Spatie\LaravelIgnition\HealthCheckController`

- **Atualizar Configuração Ignition:**
  - Método: `POST`
  - Endpoint: `/_ignition/update-config`
  - Controlador: `Spatie\LaravelIgnition\UpdateConfigController`
