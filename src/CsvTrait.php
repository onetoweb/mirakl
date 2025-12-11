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
     * 
     * @return string
     */
    public static function createCsvStringRow(array $row): string
    {
        return '"'.implode('";"', $row).'"'.PHP_EOL;
    }
}
