<?php
class Application_View_Helper_TruncatedText extends Zend_View_Helper_Abstract
{
    /**
     * Truncate a string only at a whitespace
     *
     * @param string $text The string to truncate
     * @param intger $length The length to truncate to
     * @return string
     */
    public function truncatedText($text, $length)
    {
        $length = abs((int)$length);

        if (strlen($text) > $length)
        {
            $text = preg_replace("/^(.{1,$length})(\s.*|$)/s", '\\1...', $text);
        }

        return($text);
    }
}