<h1 align="center"> weather </h1>

<p align="center"> 基于 高德开放平台 的 PHP 天气信息组件。</p>

[![Build Status](https://travis-ci.org/Denny-w/weather.svg?branch=master)](https://travis-ci.org/Denny-w/weather)
![StyleCI build status](https://github.styleci.io/repos/153988790/shield) 

## 安装

```shell
$ composer require denny-w/weather -vvv
```

## 配置

在使用本扩展之前，你需要去 [高德开放平台](https://lbs.amap.com/dev/id/newuser) 注册账号，然后创建应用，获取应用的 API Key。


## 使用

```php
use ErnestWang\Weather\Weather;

$key = 'xxxxxxxxxxxxxxxxxxxxxxxxxxx';

$weather = new Weather($key);
```

### 获取实时天气
```php
$response = $weather->getLiveWeather('广州');
```

示例:

```json
{
  "status": "1",
  "count": "1",
  "info": "OK",
  "infocode": "10000",
  "lives": [
    {
      "province": "广东",
      "city": "广州市",
      "adcode": "440100",
      "weather": "晴",
      "temperature": "27",
      "winddirection": "南",
      "windpower": "5",
      "humidity": "62",
      "reporttime": "2018-10-21 16:00:00"
    }
  ]
}
```
### 获取近期天气预报

```php
$response = $weather->getForecastsWeather('广州');
```
示例:

```json
{
  "status": "1",
  "count": "1",
  "info": "OK",
  "infocode": "10000",
  "forecasts": [
    {
      "city": "广州市",
      "adcode": "440100",
      "province": "广东",
      "reporttime": "2018-10-21 11:00:00",
      "casts": [
        {
          "date": "2018-10-21",
          "week": "7",
          "dayweather": "多云",
          "nightweather": "多云",
          "daytemp": "27",
          "nighttemp": "22",
          "daywind": "无风向",
          "nightwind": "无风向",
          "daypower": "≤3",
          "nightpower": "≤3"
        },
        {
          "date": "2018-10-22",
          "week": "1",
          "dayweather": "小雨",
          "nightweather": "小雨",
          "daytemp": "28",
          "nighttemp": "22",
          "daywind": "无风向",
          "nightwind": "无风向",
          "daypower": "≤3",
          "nightpower": "≤3"
        },
        {
          "date": "2018-10-23",
          "week": "2",
          "dayweather": "小雨",
          "nightweather": "小雨",
          "daytemp": "26",
          "nighttemp": "21",
          "daywind": "北",
          "nightwind": "无风向",
          "daypower": "4",
          "nightpower": "≤3"
        },
        {
          "date": "2018-10-24",
          "week": "3",
          "dayweather": "小雨",
          "nightweather": "多云",
          "daytemp": "27",
          "nighttemp": "22",
          "daywind": "无风向",
          "nightwind": "无风向",
          "daypower": "≤3",
          "nightpower": "≤3"
        }
      ]
    }
  ]
}
```

### 获取 XML 格式返回值
   第三个参数为返回值类型，可选 json 与 xml，默认 json：

```php
$response = $weather->getLiveWeather('广州', 'xml');
```

示例:

```xml
<?xml version="1.0" encoding="utf-8"?>

<response>
  <status>1</status>
  <count>1</count>
  <info>OK</info>
  <infocode>10000</infocode>
  <forecasts type="list">
    <forecast>
      <city>广州市</city>
      <adcode>440100</adcode>
      <province>广东</province>
      <reporttime>2018-10-21 11:00:00</reporttime>
      <casts type="list">
        <cast>
          <date>2018-10-21</date>
          <week>7</week>
          <dayweather>多云</dayweather>
          <nightweather>多云</nightweather>
          <daytemp>27</daytemp>
          <nighttemp>22</nighttemp>
          <daywind>无风向</daywind>
          <nightwind>无风向</nightwind>
          <daypower>≤3</daypower>
          <nightpower>≤3</nightpower>
        </cast>
        <cast>
          <date>2018-10-22</date>
          <week>1</week>
          <dayweather>小雨</dayweather>
          <nightweather>小雨</nightweather>
          <daytemp>28</daytemp>
          <nighttemp>22</nighttemp>
          <daywind>无风向</daywind>
          <nightwind>无风向</nightwind>
          <daypower>≤3</daypower>
          <nightpower>≤3</nightpower>
        </cast>
        <cast>
          <date>2018-10-23</date>
          <week>2</week>
          <dayweather>小雨</dayweather>
          <nightweather>小雨</nightweather>
          <daytemp>26</daytemp>
          <nighttemp>21</nighttemp>
          <daywind>北</daywind>
          <nightwind>无风向</nightwind>
          <daypower>4</daypower>
          <nightpower>≤3</nightpower>
        </cast>
        <cast>
          <date>2018-10-24</date>
          <week>3</week>
          <dayweather>小雨</dayweather>
          <nightweather>多云</nightweather>
          <daytemp>27</daytemp>
          <nighttemp>22</nighttemp>
          <daywind>无风向</daywind>
          <nightwind>无风向</nightwind>
          <daypower>≤3</daypower>
          <nightpower>≤3</nightpower>
        </cast>
      </casts>
    </forecast>
  </forecasts>
</response>

```
### 参数说明

```php
array | string   getWeather(string $city, string $type = 'base', string $format = 'json')
```

- `$city`  - 城市名，比如：“广州”；
- `$type`  - 返回内容类型：base: 返回实况天气 / all:返回预报天气;
- `$format`  - 输出的数据格式，默认为 json 格式，当 output 设置为 “xml” 时，输出的为 XML 格式的数据。

### 在 Laravel 中使用

   在 Laravel 中使用也是同样的安装方式，配置写在 `config/services.php` 中：

```php
    .
    .
    .
     'weather' => [
        'key' => env('WEATHER_API_KEY'),
    ],
```

然后在 `.env` 中配置 `WEATHER_API_KEY` ：

    WEATHER_API_KEY=xxxxxxxxxxxxxxxxxxxxx


可以用两种方式来获取 `ErnestWang\Weather\Weather` 实例：

#### 方法参数注入

```php
    .
    .
    .
    public function show(Weather $weather) 
    {
        $response = $weather->getWeather('广州');
    }
    .
    .
    .
```

#### 服务名访问

```php
    .
    .
    .
    public function edit() 
    {
        $response = app('weather')->getWeather('深圳');
    }
    .
    .
    .
```

## 参考

- [高德开放平台天气接口](https://lbs.amap.com/api/webservice/guide/api/weatherinfo/)


## License

MIT