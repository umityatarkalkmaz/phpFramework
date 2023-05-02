<?php

class Model extends Database
{
    private string $sql;
    private array $params = [];

    private function select($table): static
    {
        $sql = 'SELECT * FROM ' . $table;
        $this->sql = $sql;
        return $this;
    }

    private function where($column, $value): static
    {
        $sql = $this->sql . ' WHERE ' . $column . ' = ?';
        $this->sql = $sql;
        $this->params[] = $value;
        return $this;
    }

    private function all(): bool|array
    {
        $sql = $this->sql;
        $stmt = $this->db->prepare($sql);
        $stmt->execute($this->params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function sqlString(): string
    {
        return $this->sql;
    }
}
