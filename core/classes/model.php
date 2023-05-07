<?php

class Model extends Database
{
    protected string $sql;
    protected array $params = [];

    protected function select($table): static
    {
        $sql = 'SELECT * FROM ' . $table;
        $this->sql = $sql;
        return $this;
    }

    protected function where($column, $value): static
    {
        $sql = $this->sql . ' WHERE ' . $column . ' = ?';
        $this->sql = $sql;
        $this->params[] = $value;
        return $this;
    }

    protected function all(): bool|array
    {
        $sql = $this->sql;
        $stmt = $this->db->prepare($sql);
        $stmt->execute($this->params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function sqlString(): string
    {
        return $this->sql;
    }
}
