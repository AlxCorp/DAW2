<?php 
class Board{
    private $_board = [];

    function __construct($boardSize) {

        for ($n = 0; $n < $boardSize) {
            $temp_arr = [];
            for ($n = 0; $n < $boardSize) {
                array_push($temp_arr, 0);
            }
            array_push($this->_board, $temp_arr);
        }
    }

    public function $getBoard() {
        $toReturn = $this->_board;
        return $toReturn;
    }

    public function $setValue($row, $column, $value) {
        if (is_string($value) || is_numeric($value)) {
            $this->_board[$row][$column] = $value;
            return $this->_board[$row][$column]
        } else {
            
        }
    }
}
?>    