<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model {
    
    /**
     * @return array
     */
    public function getTableColumns() {
        return $this->getConnection()
            ->getSchemaBuilder()
            ->getColumnListing($this->getTable());
    }
}