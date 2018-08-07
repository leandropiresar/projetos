<?php

class WPMSEO_Utils {

    public static $has_filters;
    private static $cache_clear = array();

    public static function is_url_relative($url) {
        return ( strpos($url, 'http') !== 0 && strpos($url, '//') !== 0 );
    }

    public static function standardize_whitespace($string) {
        return trim(str_replace('  ', ' ', str_replace(array("\t", "\n", "\r", "\f"), ' ', $string)));
    }

    public static function strip_shortcode($text) {
        return preg_replace('`\[[^\]]+\]`s', '', $text);
    }

    public static function translate_score($val, $css_value = true) {
        if ($val > 10) {
            $val = round($val / 10);
        }
        switch ($val) {
            case 0:
                $score = __('N/A', 'wp-meta-seo');
                $css = 'na';
                break;
            case 4:
            case 5:
                $score = __('Poor', 'wp-meta-seo');
                $css = 'poor';
                break;
            case 6:
            case 7:
                $score = __('OK', 'wp-meta-seo');
                $css = 'ok';
                break;
            case 8:
            case 9:
            case 10:
                $score = __('Good', 'wp-meta-seo');
                $css = 'good';
                break;
            default:
                $score = __('Bad', 'wp-meta-seo');
                $css = 'bad';
                break;
        }

        if ($css_value) {
            return $css;
        } else {
            return $score;
        }
    }

    public static function sanitize_text_field($value) {
        $filtered = wp_check_invalid_utf8($value);

        if (strpos($filtered, '<') !== false) {
            $filtered = wp_pre_kses_less_than($filtered);
            // This will strip extra whitespace for us.
            $filtered = wp_strip_all_tags($filtered, true);
        } else {
            $filtered = trim(preg_replace('`[\r\n\t ]+`', ' ', $filtered));
        }

        $found = false;
        while (preg_match('`[^%](%[a-f0-9]{2})`i', $filtered, $match)) {
            $filtered = str_replace($match[1], '', $filtered);
            $found = true;
        }
        unset($match);

        if ($found) {
            // Strip out the whitespace that may now exist after removing the octets.
            $filtered = trim(preg_replace('` +`', ' ', $filtered));
        }


        return apply_filters('sanitize_text_field', $filtered, $value);
    }

    public static function sanitize_url($value, $allowed_protocols = array('http', 'https')) {
        return esc_url_raw(sanitize_text_field(rawurldecode($value)), $allowed_protocols);
    }

    public static function validate_int($value) {
        if (!isset(self::$has_filters)) {
            self::$has_filters = extension_loaded('filter');
        }

        if (self::$has_filters) {
            return filter_var($value, FILTER_VALIDATE_INT);
        } else {
            return self::emulate_filter_int($value);
        }
    }

    public static function calc($number1, $action, $number2, $round = false, $decimals = 0, $precision = 10) {
        static $bc;

        if (!is_scalar($number1) || !is_scalar($number2)) {
            return false;
        }

        if (!isset($bc)) {
            $bc = extension_loaded('bcmath');
        }

        if ($bc) {
            $number1 = number_format($number1, 10, '.', '');
            $number2 = number_format($number2, 10, '.', '');
        }

        $result = null;
        $compare = false;

        switch ($action) {
            case '+':
            case 'add':
            case 'addition':
                $result = ( $bc ) ? bcadd($number1, $number2, $precision) /* string */ : ( $number1 + $number2 );
                break;

            case '-':
            case 'sub':
            case 'subtract':
                $result = ( $bc ) ? bcsub($number1, $number2, $precision) /* string */ : ( $number1 - $number2 );
                break;

            case '*':
            case 'mul':
            case 'multiply':
                $result = ( $bc ) ? bcmul($number1, $number2, $precision) /* string */ : ( $number1 * $number2 );
                break;

            case '/':
            case 'div':
            case 'divide':
                if ($bc) {
                    $result = bcdiv($number1, $number2, $precision); // String, or NULL if right_operand is 0.
                } elseif ($number2 != 0) {
                    $result = ( $number1 / $number2 );
                }

                if (!isset($result)) {
                    $result = 0;
                }
                break;

            case '%':
            case 'mod':
            case 'modulus':
                if ($bc) {
                    $result = bcmod($number1, $number2, $precision); // String, or NULL if modulus is 0.
                } elseif ($number2 != 0) {
                    $result = ( $number1 % $number2 );
                }

                if (!isset($result)) {
                    $result = 0;
                }
                break;

            case '=':
            case 'comp':
            case 'compare':
                $compare = true;
                if ($bc) {
                    $result = bccomp($number1, $number2, $precision); // Returns int 0, 1 or -1.
                } else {
                    $result = ( $number1 == $number2 ) ? 0 : ( ( $number1 > $number2 ) ? 1 : - 1 );
                }
                break;
        }

        if (isset($result)) {
            if ($compare === false) {
                if ($round === true) {
                    $result = round(floatval($result), $decimals);
                    if ($decimals === 0) {
                        $result = (int) $result;
                    }
                } else {
                    $result = ( intval($result) == $result ) ? intval($result) : floatval($result);
                }
            }

            return $result;
        }

        return false;
    }

    public static function trim_nbsp_from_string($string) {
        $find = array('&nbsp;', chr(0xC2) . chr(0xA0));
        $string = str_replace($find, ' ', $string);
        $string = trim($string);

        return $string;
    }

}
