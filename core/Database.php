<?php

namespace core;

use PDO;
use PDOException;

class Database
{
    private static $connection = null;

    public static function connect(): PDO
    {
        if (self::$connection !== null) {
            return self::$connection;
        }

        $config = require_once __DIR__ . '/../config/database.php';

        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=%s',
            $config['host'],
            $config['database'],
            $config['charset']
        );

        try {
            self::$connection = new PDO(
                $dsn,
                $config['user'],
                $config['password'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);

            return self::$connection;
        } catch (PDOException $e) {
            die('Error Connecting to Database: ' . $e->getMessage());
        }
    }

    public static function getAll(string $table, ?string $condition = null, array $values = []): array
    {
        $sql = 'SELECT * FROM ' . $table . '';

        if ($condition !== null) {
            $sql .= ' WHERE ' . $condition;
        }

        $stmt = self::connect()->prepare($sql);
        $stmt->execute($values);
        return $stmt->fetchAll();
    }

    public static function getFetch(string $table, string $column , string|int $value, ?int $limit = null ) : array
    {
        $a = '';
        if($limit !== null) {
        $a = 'LIMIT '.$limit;
        }
        $stmt = self::connect()->prepare("SELECT * FROM {$table} WHERE $column = :value {$a}");
        $stmt->execute(['value' => $value]);
        if($stmt->rowCount() > 1) {
            return $stmt->fetchAll();
        }

        return $stmt->fetch();
    }

    public static function getLastElement(string $table, string $column): int
    {
        $sql = "SELECT MAX({$column}) FROM {$table}";

        $stmt = self::connect()->prepare($sql);

        $stmt->execute();

        return (int) $stmt->fetchColumn();
    }


    public static function getJoin(string $table, array $data): array
    {
        $select = $data['select'] ?? '*';
        $alias  = $data['alias'] ?? '';

        $sql = "SELECT {$select} FROM {$table}";


        if ($alias) {
            $sql .= " AS {$alias}";
        }

        foreach ($data['joins'] ?? [] as $join) {
            $type  = $join['type'] ?? 'LEFT';
            $table = $join['table'];
            $alias = $join['alias'] ?? '';
            $on    = $join['on'];

            $sql .= " {$type} JOIN {$table}";

            if ($alias) {
                $sql .= " AS {$alias}";
            }

            $sql .= " ON {$on}";
        }

        if (!empty($data['where'])) {
            $sql .= " WHERE {$data['where']}";
        }
        $stmt = self::connect()->prepare($sql);
        $stmt->execute($data['params'] ?? []);

        return $stmt->fetchAll();
    }


    public static function getRow(string $table, array $data ): array|bool
    {
        $select = $data['select'] ?? '*';
        $sql = "SELECT {$select} FROM {$table}";
        if (!empty($data['where'])) {
            $sql .= " WHERE {$data['where']}";

        }
        $stmt = self::connect()->prepare($sql);
        $stmt->execute($data['params'] ?? []);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function insertInTable(string $table, array $data): int
    {
        $columns = array_keys($data);
        $values = ':' . implode(', :', $columns);
        $columns = implode(', ', $columns);
        $stmt = self::connect()->prepare('INSERT INTO ' . $table . '('. $columns .') VALUES('. $values .')');
        var_dump('INSERT INTO ' . $table . '('. $columns .') VALUES('. $values .')');
        var_dump($data);
        $stmt->execute($data);
        return self::connect()->lastInsertId();
    }
    public static function updateInTable(string $table, array $data, ?int $id = null): bool
    {
        if ($id !== null) {
            $data['id'] = $id;
        }
        $fields = [];
        foreach ($data as $key => $value) {
            if ($key === 'id') {
                continue;
            }
            $fields[] = "`$key` = :$key";
        }
        $setStr = implode(', ', $fields);
        $sql = "UPDATE `{$table}` SET {$setStr} WHERE `id` = :id";

        $stmt = self::connect()->prepare($sql);
        return $stmt->execute($data);
    }
    public static function deleteFromTable(string $table, array $data): array
    {
        $stmt = self::connect()->prepare('DELETE FROM ' . $table . ' WHERE id = :id');
        $stmt->execute(['id' => $data['id']]);
        return $data;

    }
}
