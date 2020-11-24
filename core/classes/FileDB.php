<?php

/**
 * Class FileDB
 */
class FileDB
{

    private $file_name;
    private $data = [];

    /**
     * FileDB constructor.
     *
     * @param string $file_name
     */
    public function __construct(string $file_name)
    {
        $this->file_name = $file_name;
    }

    /**
     * Sets keys data.
     *
     * @param array $data_array
     */
    public function setData(array $data_array): void
    {
        $this->data = $data_array;
    }

    /**
     * Returns data array.
     *
     * @return mixed
     */
    public function getData(): array
    {
        return $this->data ?? [];
    }

    /**
     * Function saves data in the file provided.
     *
     * @return bool
     */
    public function save(): bool
    {

        $bytes_written = file_put_contents($this->file_name, json_encode($this->getData()));

        if ($bytes_written === FALSE) {
            return false;
        }

        return true;
    }

    /**
     * Function loads data from the file provided;
     *
     * @return array|mixed
     */
    public function load(): bool
    {
        if (file_exists($this->file_name)) {
            $data = file_get_contents($this->file_name);

            if ($data !== false) {
                $this->setData(json_decode($data, true) ?? []);
            } else {
                $this->setData([]);
            }

            return true;
        }

        return false;
    }

    /**
     * Functions creates an empty array with table_name index if it doesn't exist yet
     *
     * @param $table_name
     * @return bool
     */
    public function createTable(string $table_name): bool
    {
        if (!$this->tableExists($table_name)) {
            $this->getData()[$table_name] = [];
            return true;
        }

        return false;
    }

    /**
     * Functions checks whether the table_name index already exists in data array
     *
     * @param $table_name
     * @return bool
     */
    public function tableExists(string $table_name): bool {
        if (isset($this->getData()[$table_name])) {
            return true;
        }

        return false;
    }

}