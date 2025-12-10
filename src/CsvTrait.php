<?php

namespace Onetoweb\Mirakl;

trait CsvTrait
{
    /**
     * @param array $row
     * @param array $append = []
     * 
     * @return string
     */
    public static function createCsvString(array $data, array $append = []): string
    {
        $csv = '';
        
        $headers = array_keys(array_merge(current($data), $append));
        
        $csv .= self::createCsvStringRow($headers);
        
        foreach ($data as $row) {
            
            $csv .= self::createCsvStringRow(array_merge($row, $append));
        }
        
        return $csv;
    }
    
    /**
     * @param array $row
     * @param array $append = []
     * 
     * @return string
     */
    public static function createCsvStringRow(array $row): string
    {
        $csv = '';
        
        $colCount = count(array_merge($row));
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
