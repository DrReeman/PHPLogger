# PHPLogger

# Система логгирования спроектирована согласно стандартов PSR.
# Класс Logger унаследован от класса Psr/Log/AbstractLogger и интерфейса Psr/Log/LoggerInterface.
# Классы DbLogger, FileLogger и STDOutLogger наследуются от класса Logger, реализуют паттерн Singleton и каждый из них реализуют свой метод log().
# Классы DbLogger, FileLogger и STDOutLogger служат для записи логов в базу данных, файл, поток STDOUT соответственно.
# Класс Logger реализует паттерн Factory Method для классов DbLogger, FileLogger и STDOutLogger.
# Для системы использовалась база данных MySQL.
# Для подключения к базе данных используется класс DBConnection, PDO-драйвер.
# Для создания объекта нужного логгера необходимо написать $Obj = Logger::init('{NameLogger}');, где {NameLogger} - имя нужного логгера.
# Для автозагрузки классов использовался менеджер зависимостей composer.
# Дефолтный файл для логов default.log. Можно переназначить методом setPath('{path}'), где {path} - нужный путь до файла.
# Дамп базы данных прилагается (файл LoggerDB.sql)
