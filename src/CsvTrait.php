<?php

namespace Onetoweb\Mirakl;

trait CsvTrait
{
    /**
     * @param array $row
     * 
     * @return string
     */
    public static function createCsvString(array $data): string
    {
        $csv = '';
        
        $headers = array_keys(current($data));
        
        $csv .= self::createCsvStringRow($headers);
        
        foreach ($data as $row) {
            $csv .= self::createCsvStringRow($row);
        }
        
        return $csv;
    }
    
    /**
     * @param array $row
     * 
     * @return string
     */
    public static function createCsvStringRow(array $row): string
    {
        $csv = '';
        
        $colCount = count($row);
        $i = 0;
        foreach ($row as $col) {
            
            $csv .= '"'.$col.'"';
            
            if ($i < ($colCount - 1)) {
                $csv .= ';';
            }
            
            $i++;
        }
        
        $csv .= PHP_EOL;
        
        return $csv;
    }
}
