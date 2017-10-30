##laravel 之 application

众所周知,laravel 的核心是服务容器,而对于服务容器的概念,可能对于大多数人来说,是比较难理解的。

从官方文档是,我们可以知道：
>Laravel 服务容器是用于管理类的依赖和执行依赖注入的工具。

而文档中也主要讲述了如何绑定和解析类。

####服务容器
首先我们从入口文件的 `index.php` 开始分析：
````php
<?php
require __DIR__.'/../bootstrap/autoload.php';  // 自动加载

$app = require_once __DIR__.'/../bootstrap/app.php'; // 实例化服务容器

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);  // 解析核心

// 解析响应
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);  

// 响应
$response->send();

// 后置
$kernel->terminate($request, $response);

````
