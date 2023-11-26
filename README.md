<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

### Rotas da API

- **POST** `/api/email/verification-notification`
  - **Controller**: `Auth\EmailVerificationNotificationController@store`
  - **Descrição**: Envia a notificação de verificação de e-mail.

- **POST** `/api/forgot-password`
  - **Controller**: `Auth\PasswordResetLinkController@store`
  - **Descrição**: Inicia o processo de redefinição de senha.

- **POST** `/api/login`
  - **Controller**: `Auth\AuthenticatedSessionController@store`
  - **Descrição**: Inicia uma sessão de usuário autenticado.

- **POST** `/api/logout`
  - **Controller**: `Auth\AuthenticatedSessionController@destroy`
  - **Descrição**: Encerra a sessão do usuário autenticado.

- **POST** `/api/register`
  - **Controller**: `Auth\RegisteredUserController@store`
  - **Descrição**: Registra um novo usuário.

- **POST** `/api/register-salon`
  - **Controller**: `SalonController@store`
  - **Descrição**: Registra um novo salão.

- **POST** `/api/reset-password`
  - **Controller**: `Auth\NewPasswordController@store`
  - **Descrição**: Redefine a senha do usuário.

- **GET|HEAD** `/api/user`
  - **Descrição**: Obtém informações do usuário autenticado.

- **GET|HEAD** `/api/verified/{verified}`
  - **Descrição**: Rota para lidar com a verificação do e-mail.

- **GET|HEAD** `/api/verify-email/{id}/{hash}`
  - **Controller**: `Auth\VerifyEmailController`
  - **Descrição**: Rota para verificar o e-mail do usuário.
