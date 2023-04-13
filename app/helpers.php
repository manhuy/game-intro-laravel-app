<?php

    if (! function_exists('formatDate')) {
        function formatDate(string $string, string $format = 'Y-m-d H:i:s'): string {
            return date($format, strtotime($string));
        }
    }