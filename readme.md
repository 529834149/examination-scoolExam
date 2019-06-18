
## 关于本项目



- 本项目主要为女朋友学校开发的一个成绩单系统



## 本项目运用的知识点

## 运行 Laravel Mix

- **注:样式调整，每次需要保存刷新页面，这次运用了运行 Laravel Mix，非常不错节省不少时间**
- **$ yarn config set registry https://registry.npm.taobao.org**
- **$ yarn install**
- **$ npm run watch-poll**
- 注意watch-poll 会在你的终端里持续运行，监控 resources 文件夹下的资源文件是否有发生改变。在 watch-poll 命令运行的情况下，一旦资源文件发生变化，Webpack 会自动重新编译。


## 验证码

- **使用 Composer 安装：composer require "mews/captcha:~2.0"**
- **运行以下命令生成配置文件 :php artisan vendor:publish --provider='Mews\Captcha\CaptchaServiceProvider' **
- 生成配置文件config/captcha.php


## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
