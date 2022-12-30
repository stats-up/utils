<?php

namespace App\Http\Livewire\Sup;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Database extends Component
{
    public $error = "";
    public $status = "";
    public $tables = [];
    public $selectedTable = null;
    public $selectedTableData = null;
    //FUNCTIONS
    public function selectTable($tableName){
         $this->selectedTable = $this->getColumnsData($tableName);
         $this->selectedTableData = null;
         $this->hydrate();
    }
    public function selectTableData($tableName){
        $this->selectedTableData = $this->getRowsFromTable($tableName);
        $this->selectedTable = null;
        $this->hydrate();
    }
    private function getRowsFromTable($tableName){
        $result = DB::select("SELECT * FROM $tableName LIMIT 100");
        $array = [];
        $columns = $this->getColumnsData($tableName);
        $index = 0;
        $row = [];
        foreach($columns as $column){
            $row[$index] = $column['name'];
            $index++;
        }
        array_push($array, $row);
        foreach($result as $row){
            $row = (array) $row;
            array_push($array, $row);
        }
        return $array;
    }
    private function validateConnection(){
        $query = "SELECT 1 FROM dual";
        try{
            $result = DB::select($query);
            return true;
        }catch(\Exception $e){
            return false;
        }
    }
    private function getTables(){
        $tables = DB::select('SHOW TABLES');
        $array = [];
        foreach($tables as $table){
            $row = (array) $table;
            $new["name"] = $row["Tables_in_lzjfqolh_statsup"];
            array_push($array, $new);
        }
        $this->tables = $array;
    }
    private function getColumnsData($table){
        $columns = DB::select('SHOW COLUMNS FROM '.$table);
        $array = [];
        $index = 1;
        foreach($columns as $column){
            $row = (array) $column;
            $new["index"] = $index;
            $new["name"] = $row["Field"];
            $new["type"] = $row["Type"];
            $new["null"] = $row["Null"];
            $new["key"] = $row["Key"];
            $new["default"] = $row["Default"];
            $new["extra"] = $row["Extra"];
            //add to array
            array_push($array, $new);
            $index++;
        }
        return $array;
    }
    //LIVEWIRE
    public function hydrate(){

    }
    public function mount(){
        if($this->validateConnection()){
            $this->status = "OK";
            $this->getTables();
        }else{
            $this->status = "ERROR";
            $this->error = "No se pudo conectar a la base de datos";
        }
    }
    public function render()
    {
        return view('livewire.sup.database');
    }
}
