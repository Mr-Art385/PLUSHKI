<?php
class Database {
    private static $db;    // Единственный экземпляр класса (паттерн Singleton)
    private $pdo;          // Объект PDO для соединения с БД

    // Конструктор private – нельзя создать объект через new Database()
    private function __construct() {
        try {
            $this->pdo = new PDO(
                'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
                DB_USER,
                DB_PASSWORD
            );
            $this->pdo->exec("SET NAMES utf8mb4"); // Кодировка
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Ошибка подключения к БД: ' . $e->getMessage());
        }
    }

    // Получить единственный экземпляр класса (Singleton)
    public static function getDBO() {
        if (!self::$db) {
            self::$db = new Database();
        }
        return self::$db;
    }

    // Вспомогательный метод – возвращает имя таблицы с префиксом
    private function getTableName(string $table_name): string {
        return '`' . DB_PREFIX . $table_name . '`';
    }

    // Получить все строки из таблицы (с возможными условиями WHERE и сортировкой)
    public function getRows(string $table_name, string $where = '', array $values = [], string $order_by = ''): array {
        $sql = 'SELECT * FROM ' . $this->getTableName($table_name);
        if ($where) {
            $sql .= " WHERE $where";
        }
        if ($order_by) {
            $sql .= " ORDER BY $order_by";
        }
        $query = $this->pdo->prepare($sql);
        $query->execute($values);
        return $query->fetchAll();
    }

    // Получить одну строку по ID
    public function getRowById(string $table_name, int $id): array {
        $sql = 'SELECT * FROM ' . $this->getTableName($table_name) . ' WHERE id = ? LIMIT 1';
        $query = $this->pdo->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetch();
        return $result ?: [];
    }
}
?>