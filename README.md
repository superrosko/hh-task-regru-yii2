# hr-task-regru-yii2

[![GitHub tag (latest SemVer)][ico-github-tag-version]][link-github-tag-version]
[![Packagist][ico-license]][link-license]
[![GitHub code size in bytes][ico-github-size]][link-github]
[![GitHub top language][ico-github-top-language]][link-github]

## Introduction

Reg.ru yii2 hr task.

## Requirements

- Nginx 1.14.0
- MySQL 5.7.30
- Node 10.16.0
- PHP >= 5.6.0
  - Reflection PHP Extension
  - PCRE PHP Extension
  - SPL PHP Extension
  - Ctype PHP Extension
  - Mbstring PHP Extension
  - OpenSSL PHP Extension
  - Intl PHP Extension
  - Fileinfo PHP Extension
  - DOM PHP Extension

Run for check server:
```bash
php requirements.php
```

## Installation

### Docker

#### Git clone
```bash
git clone git@github.com:superrosko/hr-task-regru-yii2.git .
```

#### Run initialization
```bash
make initial
```


## Usage

### Docker

Restart docker compose:
```bash
make compose_restart
```
Generating ssl certificates:
```bash
make ssl_gen
```
Install dependencies:
```bash
make deps_install
```
Update dependencies:
```bash
make deps_update
```
App configuration:
```bash
make app_config
```
Create new database user if not exists:
```bash
make db_create_user
```
Execute mysql cli:
```bash
make db_exec
```
Apply migrations:
```bash
make db_migration
```
App php exec: 
```bash
make php_exec COMMAND="artisan"
```
App initialization: 
```bash
make initial
```

## Credits

- [Dmitriy Bespalov][link-author]
- [All Contributors][link-contributors]

## License

The BSD 3-Clause. Please see [License File][link-license] for more information.


[link-author]: https://github.com/superrosko
[link-contributors]: https://github.com/superrosko/hr-task-regru-yii2/contributors
[link-github]: https://github.com/superrosko/hr-task-regru-yii2
[link-github-tag-version]: https://github.com/superrosko/hr-task-regru-yii2
[link-license]: LICENSE.md

[ico-github-size]: https://img.shields.io/github/languages/code-size/superrosko/hr-task-regru-yii2.svg?style=flat
[ico-github-top-language]: https://img.shields.io/github/languages/top/superrosko/hr-task-regru-yii2.svg?style=flat
[ico-github-tag-version]: https://img.shields.io/github/v/tag/superrosko/hr-task-regru-yii2.svg?style=flat
[ico-license]: https://img.shields.io/github/license/superrosko/hr-task-regru-yii2.svg?style=flat
