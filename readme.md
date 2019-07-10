
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


## 资源路由
- **可以看到使用 resource 方法不仅节省很多代码，且严格遵循了 RESTful URI 的规范，在后续的开发中，我会优先选择 resource 路由。**
- **Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);**
- **上面代码将等同于：**

- **Route::get('/users/{user}', 'UsersController@show')->name('users.show');**
- **Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');**
- **Route::patch('/users/{user}', 'UsersController@update')->name('users.update');**

## 中文语言包
- **composer require "overtrue/laravel-lang:~3.0"：**

## 时间戳友好输出
- **$user->created_at->diffForHumans() **
- **如果想变成中文在AppServiceProvider里添加boot中添加 \Carbon\Carbon::setLocale('zh');**

## 首页运用了让layui前端框架
- **$https://www.layui.com/doc/modules/table.html **
