<?php

/**
 * Convert month number to month name in Indonesian
 * @param int $month Month number (1-12)
 * @return string Month name in Indonesian
 */
function getMonthName($month)
{
    $months = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    ];

    return $months[$month] ?? 'Bulan Tidak Valid';
}

/**
 * Convert date to format with month name
 * @param string $date Date in format Y-m-d
 * @return string Formatted date (e.g., 1 Januari 2024)
 */
function formatDateWithMonthName($date)
{
    $parsed = date_parse($date);
    $day = $parsed['day'];
    $month = getMonthName($parsed['month']);
    $year = $parsed['year'];

    return "{$day} {$month} {$year}";
}