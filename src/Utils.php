<?php

namespace Onetoweb\Mirakl;

/**
 * Utils
 */
final class Utils
{
    /**
     * @param string $filename
     * @param array $data
     * 
     * @return bool
     */
    public static function storeFile(string $filename, array $data): bool
    {
        return file_put_contents($filename, base64_decode($data['contents'])) !== false;
    }
}
