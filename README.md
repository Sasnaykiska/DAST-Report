# DAST-Report
### Установить менеджер пакетов brew, если его еще нет

```
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
```
Затем открыть файл .zhrc и вставить 
```
export PATH="/opt/homebrew/bin:$PATH"
```

### Предварительные условия 

Нужно установить:

* [python3](https://docs.python.org/3/) 
* [PHP](https://www.php.net/docs.php) 

```
brew install python3 && brew install php
```

### Запуск

Для запуска программы нужно переместить архив в скаченную папку и передать название архива как аргумент

```
php index.php 7-1.zip
```


