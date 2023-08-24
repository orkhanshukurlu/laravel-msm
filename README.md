<img src="https://banners.beyondco.de/Laravel%20MSM.png?theme=light&packageManager=composer+require&packageName=orkhanshukurlu%2Flaravel-msm&pattern=brickWall&style=style_1&description=Send+SMS+with+MSM&md=1&showWatermark=0&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg">

Laravel MSM - MSM provayderi vasitəsilə SMS göndərilməsini təmin edən Laravel paketidir

[![Laravel 10](https://img.shields.io/badge/Laravel-10-red.svg)](http://laravel.com)
[![Latest Stable Version](https://img.shields.io/packagist/v/orkhanshukurlu/laravel-msm.svg)](https://packagist.org/packages/orkhanshukurlu/laravel-msm)
[![Total Downloads](https://poser.pugx.org/orkhanshukurlu/laravel-msm/downloads.png)](https://packagist.org/packages/orkhanshukurlu/laravel-msm)
[![License](http://poser.pugx.org/orkhanshukurlu/laravel-msm/license)](https://packagist.org/packages/orkhanshukurlu/laravel-msm)


## Quraşdırma

`composer` vasitəsilə paketi quraşdırın

    composer require orkhanshukurlu/laravel-msm

`config` və `migration` faylını kopyalayın

    php artisan vendor:publish --provider="OrkhanShukurlu\MSM\MSMServiceProvider"

`migration` fayllarını işə salın

    php artisan migrate

## Konfiqurasiya

`.env` faylına aşağıdakı konfiqurasiyaları əlavə edin

```php
MSM_USERNAME=
MSM_PASSWORD=
MSM_SENDER=
MSM_LOGGING=
```

- `MSM_USERNAME` - MSM tərəfindən verilən istifadəçi adını əlavə edin
- `MSM_PASSWORD` - MSM tərəfindən verilən şifrəni əlavə edin
- `MSM_SENDER` - MSM tərəfindən verilən göndərən adını əlavə edin
- `MSM_LOGGING` - Hər SMS sorğusunun cədvələ əlavə olunmasını istəyirsinizsə `true` edin

## İstifadə

`send` metodunu istifadə edərək telefon nömrəsinə SMS göndərin

```php

MSM::send('+994773339800', 'Hello world !');

// və ya

msm()->send('+994773339800', 'Hello world !');

// və ya

msm('+994773339800', 'Hello world !');

```

`try-catch` blokunu istifadə edərək mümkün xətaları idarə edin

```php

try {
    MSM::send('+994773339800', 'Hello world !');
    
    // SMS uğurla göndərildi
    
} catch (SMSNotSentException $exception) {    
    report($exception->getMessage());
    
    // SMS göndərilərkən xəta baş verdi
}

```
### Loglama

Loglama aktiv olduqda hər SMS sorğusu göndərildikdə `msm_logs` cədvəlinə məlumat əlavə olunacaq

> Hər hansısa nömrəyə göndərilən bütün SMS sorğuları haqqında məlumat əldə etmək üçün `getByPhone` metodundan istifadə edə bilərsiniz

```php

MSMLog::getByPhone('+994773339800');

```

> MSM tərəfindən verilən dokumentasiyada qeyd olunan status kodlarına uyğun bütün SMS sorğuları haqqında məlumat əldə etmək üçün `getByCode` metodundan istifadə edə bilərsiniz

```php

MSMLog::getByCode(100);

```

> Əgər bu 2 metod istifadə edərkən cədvəldən bütün sütunları yox, ancaq istədiyiniz sütunları gətirmək istəyirsinizsə metodları aşağıdakı kimi istifadə edə bilərsiniz

```php

MSMLog::getByPhone('+994773339800', ['id', 'phone', 'message']);

MSMLog::getByCode(100, ['id', 'phone', 'message', 'response_code']);

```

### Lisenziya

Laravel MSM [MIT lisenziyası](https://github.com/orkhanshukurlu/laravel-msm/blob/master/LICENSE.md) altında buraxılıb

### Əlaqə

Telegram: [Orxan Şükürlü](https://t.me/orkhanshukurlu/)
