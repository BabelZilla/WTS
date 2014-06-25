<?php

//namespace Wts;

define("EM_NS", "http://www.mozilla.org/2004/em-rdf#");
define("MF_RES", "urn:mozilla:install-manifest");
$singleprops = array(
    "id" => 1,
    "name" => 1,
    "description" => 1,
    "version" => 1,
    "creator" => 1,
    "homepageURL" => 1,
    "updateURL" => 1,
    "optionsURL" => 1,
    "iconURL" => 1,
    "updateURL" => 1,
    "updateKey" => 1,
    "icon64URL" => 1,
    "hidden" => 1,
    "type" => 1,
    "unpack" => 1,
    "bootstrap" => 1,
);

$multiprops = array(
    "contributor" => 1,
    "targetApplication" => 1,
    "requires" => 1,
    "file" => 1,
    "locale" => 1,
    "localized" => 1,
    "targetPlatform" => 1,
    "developer" => 1,
    "translator" => 1,
    "requires" => 1,
);

/**
 * Converts and fixes HTML entities.
 *
 * This function normalizes HTML entities. It will convert "AT&T" to the correct
 * "AT&amp;T", "&#00058;" to "&#58;", "&#XYZZY;" to "&amp;#XYZZY;" and so on.
 *
 * @since 1.0.0
 *
 * @param string $string Content to normalize entities
 *
 * @return string Content with normalized entities
 */
function wp_kses_normalize_entities($string)
{
    # Disarm all entities by converting & to &amp;

    $string = str_replace('&', '&amp;', $string);

    # Change back the allowed entities in our entity whitelist

    $string = preg_replace_callback('/&amp;([A-Za-z]{2,8});/', 'wp_kses_named_entities', $string);
    $string = preg_replace_callback('/&amp;#(0*[0-9]{1,7});/', 'wp_kses_normalize_entities2', $string);
    $string = preg_replace_callback('/&amp;#[Xx](0*[0-9A-Fa-f]{1,6});/', 'wp_kses_normalize_entities3', $string);

    return $string;
}

/**
 * Callback for wp_kses_normalize_entities() regular expression.
 *
 * This function only accepts valid named entity references, which are finite,
 * case-sensitive, and highly scrutinized by HTML and XML validators.
 *
 * @since 3.0.0
 *
 * @param array $matches preg_replace_callback() matches array
 *
 * @return string Correctly encoded entity
 */
function wp_kses_named_entities($matches)
{
    global $allowedentitynames;

    if (empty($matches[1])) {
        return '';
    }

    $i = $matches[1];
    return ((!in_array($i, $allowedentitynames)) ? "&amp;$i;" : "&$i;");
}

/**
 * Callback for wp_kses_normalize_entities() regular expression.
 *
 * This function helps wp_kses_normalize_entities() to only accept 16 bit values
 * and nothing more for &#number; entities.
 *
 * @access private
 * @since 1.0.0
 *
 * @param array $matches preg_replace_callback() matches array
 *
 * @return string Correctly encoded entity
 */
function wp_kses_normalize_entities2($matches)
{
    if (empty($matches[1])) {
        return '';
    }

    $i = $matches[1];
    if (valid_unicode($i)) {
        $i = str_pad(ltrim($i, '0'), 3, '0', STR_PAD_LEFT);
        $i = "&#$i;";
    } else {
        $i = "&amp;#$i;";
    }

    return $i;
}

/**
 * Callback for wp_kses_normalize_entities() for regular expression.
 *
 * This function helps wp_kses_normalize_entities() to only accept valid Unicode
 * numeric entities in hex form.
 *
 * @access private
 *
 * @param array $matches preg_replace_callback() matches array
 *
 * @return string Correctly encoded entity
 */
function wp_kses_normalize_entities3($matches)
{
    if (empty($matches[1])) {
        return '';
    }

    $hexchars = $matches[1];
    return ((!valid_unicode(hexdec($hexchars))) ? "&amp;#x$hexchars;" : '&#x' . ltrim($hexchars, '0') . ';');
}

/**
 * Helper function to determine if a Unicode value is valid.
 *
 * @param int $i Unicode value
 *
 * @return bool true if the value was a valid Unicode number
 */
function valid_unicode($i)
{
    return ($i == 0x9 || $i == 0xa || $i == 0xd ||
        ($i >= 0x20 && $i <= 0xd7ff) ||
        ($i >= 0xe000 && $i <= 0xfffd) ||
        ($i >= 0x10000 && $i <= 0x10ffff));
}

/**
 * Convert all entities to their character counterparts.
 *
 * This function decodes numeric HTML entities (&#65; and &#x41;). It doesn't do
 * anything with other entities like &auml;, but we don't need them in the URL
 * protocol whitelisting system anyway.
 *
 * @since 1.0.0
 *
 * @param string $string Content to change entities
 *
 * @return string Content after decoded entities
 */
function wp_kses_decode_entities($string)
{
    $string = preg_replace_callback('/&#([0-9]+);/', '_wp_kses_decode_entities_chr', $string);
    $string = preg_replace_callback('/&#[Xx]([0-9A-Fa-f]+);/', '_wp_kses_decode_entities_chr_hexdec', $string);

    return $string;
}

/**
 * Regex callback for wp_kses_decode_entities()
 *
 * @param array $match preg match
 *
 * @return string
 */
function _wp_kses_decode_entities_chr($match)
{
    return chr($match[1]);
}

/**
 * Regex callback for wp_kses_decode_entities()
 *
 * @param array $match preg match
 *
 * @return string
 */
function _wp_kses_decode_entities_chr_hexdec($match)
{
    return chr(hexdec($match[1]));
}


/**
 * Converts a number of special characters into their HTML entities.
 *
 * Specifically deals with: &, <, >, ", and '.
 *
 * $quote_style can be set to ENT_COMPAT to encode " to
 * &quot;, or ENT_QUOTES to do both. Default is ENT_NOQUOTES where no quotes are encoded.
 *
 * @since 1.2.2
 *
 * @param string $string The text which is to be encoded.
 * @param mixed $quote_style Optional. Converts double quotes if set to ENT_COMPAT, both single and double if set to ENT_QUOTES or none if set to ENT_NOQUOTES. Also compatible with old values; converting single quotes if set to 'single', double if set to 'double' or both if otherwise set. Default is ENT_NOQUOTES.
 * @param string $charset Optional. The character encoding of the string. Default is false.
 * @param boolean $double_encode Optional. Whether to encode existing html entities. Default is false.
 *
 * @return string The encoded text with HTML entities.
 */
function _wp_specialchars($string, $quote_style = ENT_NOQUOTES, $charset = false, $double_encode = false)
{
    $string = (string)$string;

    if (0 === strlen($string)) {
        return '';
    }

    // Don't bother if there are no specialchars - saves some processing
    if (!preg_match('/[&<>"\']/', $string)) {
        return $string;
    }

    // Account for the previous behaviour of the function when the $quote_style is not an accepted value
    if (empty($quote_style)) {
        $quote_style = ENT_NOQUOTES;
    } elseif (!in_array($quote_style, array(0, 2, 3, 'single', 'double'), true)) {
        $quote_style = ENT_QUOTES;
    }

    // Store the site charset as a static to avoid multiple calls to backpress_get_option()
    static $_charset;
    $charset = 'UTF-8';

    $_quote_style = $quote_style;

    if ($quote_style === 'double') {
        $quote_style = ENT_COMPAT;
        $_quote_style = ENT_COMPAT;
    } elseif ($quote_style === 'single') {
        $quote_style = ENT_NOQUOTES;
    }

    // Handle double encoding ourselves
    if ($double_encode) {
        $string = @htmlspecialchars($string, $quote_style, $charset);
    } else {
        // Decode &amp; into &
        $string = Wtshelper::wp_specialchars_decode($string, $_quote_style);

        // Guarantee every &entity; is valid or re-encode the &
        $string = wp_kses_normalize_entities($string);

        // Now re-encode everything except &entity;
        $string = preg_split('/(&#?x?[0-9a-z]+;)/i', $string, -1, PREG_SPLIT_DELIM_CAPTURE);

        for ($i = 0; $i < count($string); $i += 2) {
            $string[$i] = @htmlspecialchars($string[$i], $quote_style, $charset);
        }

        $string = implode('', $string);
    }

    // Backwards compatibility
    if ('single' === $_quote_style) {
        $string = str_replace("'", '&#039;', $string);
    }

    return $string;
}
use ICanBoogie\CLDR\Provider,
    ICanBoogie\CLDR\RunTimeCache,
    ICanBoogie\CLDR\FileCache,
    ICanBoogie\CLDR\Retriever,
    ICanBoogie\CLDR\Repository,
    ICanBoogie\CLDR\LocalizedDateTime,
    ICanBoogie\DateTime;

class WtsHelper

{
    public static function getHtmlDateSelectDropDown($selected = 0)
    {
        $date = date('Y-m-d H:i:s');

        $mylist[] = WtsHelper::makeOption('as_short', WtsHelper::localeDate($date));
        $mylist[] = WtsHelper::makeOption('as_medium', WtsHelper::localeDate($date, 'as_medium'));
        $mylist[] = WtsHelper::makeOption('as_long', WtsHelper::localeDate($date, 'as_long'));
        $mylist[] = WtsHelper::makeOption('as_full', WtsHelper::localeDate($date, 'as_full'));

        // Generate the HTML radio button list.
        $html = WtsHelper::selectList($mylist, 'dateformat', 'class="inputbox"', 'value', 'text', $selected);
        return $html;
    }

    public static function getHtmlLangAvailDropDown($selected = '')
    {
        $avail = Config::get('wts.appLanguages');
        $html = '<select id="Applocale" name="Applocale">';
        foreach ($avail as $locale) {
            $html .= '<option value="' . $locale . '"';
            if ($locale == $selected) $html .= ' selected';
            $html .= '>' . $locale . '</option>' . "\n";
        }
        $html .= '</select>';
        return $html;
    }

    /*
     *
     */
    public static function localeDate($date, $format = 'as_short')
    {
        if (Auth::Check()) {
            $settings = unserialize(Auth::user()->settings);
            $timezone = $settings['timezone'];
        } else {
            $timezone = Config::get('app.timezone');
        }
        $provider = new Provider
        (
            new RunTimeCache(new FileCache(app_path() . '/cldr_cache')),
            new Retriever
        );
        $repository = new Repository($provider);
        $locale = $repository->locales[App::getLocale()];
        $time = new DateTime($date, Config::get('app.timezone'));
        $time->zone = $timezone;
        $ldt = new LocalizedDateTime($time, $locale);
        return $ldt->{$format};
    }

    public static function getHtmlTimeZoneDropDown($selected = '')
    {
        $regions = array(
            'Africa' => DateTimeZone::AFRICA,
            'America' => DateTimeZone::AMERICA,
            'Antarctica' => DateTimeZone::ANTARCTICA,
            'Asia' => DateTimeZone::ASIA,
            'Atlantic' => DateTimeZone::ATLANTIC,
            'Europe' => DateTimeZone::EUROPE,
            'Indian' => DateTimeZone::INDIAN,
            'Pacific' => DateTimeZone::PACIFIC
        );

        $timezones = array();
        foreach ($regions as $name => $mask) {
            $zones = DateTimeZone::listIdentifiers($mask);
            foreach ($zones as $timezone) {
                // Lets sample the time there right now
                $time = new DateTime(NULL, new DateTimeZone($timezone));

                $ampm = $time->format('H') > 12 ? ' (' . $time->format('g:i a') . ')' : '';

                // Remove region name and add a sample time
                $timezones[$name][$timezone] = substr($timezone, strlen($name) + 1) . ' - ' . $time->format('H:i') . $ampm;
            }
        }

        $html = '<select id="timezone" name="timezone">';
        foreach ($timezones as $region => $list) {
            $html .= '<optgroup label="' . $region . '">' . "\n";
            foreach ($list as $timezone => $name) {
                $html .= '<option value="' . $timezone . '"';
                if ($timezone == $selected) $html .= ' selected';
                $html .= '>' . $name . '</option>' . "\n";
            }
            $html .= '<optgroup>' . "\n";
        }
        $html .= '</select>';
        return $html;
    }

    public static function formatdate($date, $locale, $pattern)
    {
        $formatter = new IntlDateFormatter($locale, IntlDateFormatter::FULL, IntlDateFormatter::FULL);
        $formatter->setPattern($pattern);
        return $formatter->format($date);
    }

    public static function getLanguage($supported = array('en', 'de'))
    {
        if (Auth::Check()) {
            $settings = unserialize(Auth::User()->settings);
            return ($settings['locale']);
        }
        # start with the default language
        $language = $supported[0];
        # get the list of languages supported by the browser
        $browserLanguages = WtsHelper::getBrowserLanguages();
        # look if the browser language is a supported language, by checking the array entries
        foreach ($browserLanguages as $browserLanguage) {
            # if a supported language is found, set it and stop
            if (in_array($browserLanguage, $supported)) {
                $language = $browserLanguage;
                break;
            }
        }
        # return the found language
        return $language;
    }

    public static function getBrowserLanguages()
    {
        # check if environment variable HTTP_ACCEPT_LANGUAGE exists
        if (!isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            # if not return an empty language array
            return array();
        }
        # explode environment variable HTTP_ACCEPT_LANGUAGE at ,
        $browserLanguages = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
        # convert the headers string to an array
        $browserLanguagesSize = sizeof($browserLanguages);
        for ($i = 0; $i < $browserLanguagesSize; $i++) {
            # explode string at ;
            $browserLanguage = explode(';', $browserLanguages[$i]);
            # cut string and place into array
            $browserLanguages[$i] = substr($browserLanguage[0], 0, 2);
        }
        # remove the duplicates and return the browser languages
        return array_values(array_unique($browserLanguages));
    }

    public static function makeOption($value, $text = '', $value_name = 'value', $text_name = 'text')
    {
        $obj = new stdClass;
        $obj->$value_name = $value;
        $obj->$text_name = trim($text) ? $text : $value;
        return $obj;
    }

    public static function selectList(&$arr, $tag_name, $tag_attribs, $key, $text, $selected = NULL, $idtag = false, $flag = false)
    {
        reset($arr);
        $id = $tag_name;
        if ($idtag) {
            $id = $idtag;
        }
        $html = '<select name="' . $tag_name . '" id="' . $id . '" ' . $tag_attribs . '>';
        for ($i = 0, $n = count($arr); $i < $n; $i++) {
            if (is_array($arr[$i])) {
                $k = $arr[$i][$key];
                $t = $arr[$i][$text];
                $id = (isset($arr[$i]['id']) ? $arr[$i]['id'] : null);
            } else {
                $k = $arr[$i]->$key;
                $t = $arr[$i]->$text;
                $id = (isset($arr[$i]->id) ? $arr[$i]->id : null);
            }
            $splitText = explode(" - ", $t, 2);
            $t = $splitText[0];
            if (isset($splitText[1])) {
                $t .= " - " . $splitText[1];
            }
            $extra = '';
            if (is_array($selected)) {
                foreach ($selected as $obj) {
                    $k2 = $obj->$key;
                    if ($k == $k2) {
                        $extra .= ' selected="selected"';
                        break;
                    }
                }
            } else {
                $extra .= ($k == $selected ? ' selected="selected"' : '');
            }
            $html .= '<option value="' . $k . '" ' . $extra . '>' . $t . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    public static function radioList(&$arr, $tag_name, $tag_attribs, $selected = null, $key = 'value', $text = 'text', $idtag = false)
    {
        reset($arr);
        $html = '';
        $id_text = $tag_name;
        if ($idtag) {
            $id_text = $idtag;
        }
        for ($i = 0, $n = count($arr); $i < $n; $i++) {
            $k = $arr[$i]->$key;
            $t = $arr[$i]->$text;
            $id = (isset($arr[$i]->id) ? @$arr[$i]->id : null);
            $extra = '';
            $extra .= $id ? " id=\"" . $arr[$i]->id . "\"" : '';
            if (is_array($selected)) {
                foreach ($selected as $obj) {
                    $k2 = $obj->$key;
                    if ($k == $k2) {
                        $extra .= " selected=\"selected\"";
                        break;
                    }
                }
            } else {
                $extra .= ($k == $selected ? " checked=\"checked\"" : '');
            }
            $html .= "\n\t<input type=\"radio\" name=\"$tag_name\" id=\"$id_text$k\" value=\"" . $k . "\"$extra $tag_attribs />";
            $html .= "\n\t<label for=\"$id_text$k\">$t</label>";
        }
        $html .= "\n";
        return $html;
    }

    public function breadcrumbs($breadcrumbs, $class = 'twelve columns', $separator = ' / ')
    {
        $crumb = '<div class="row"><ul class="breadcrumbs ' . $class . '">';
        $i = 1;
        foreach ($breadcrumbs as $breadcrumb => $value) {

            if ($i < count($breadcrumbs)) {
                $crumb .= "<li><a href='" . self::createUrl($value) . "'>$breadcrumb</a></li>"; //. $separator;
            } else {
                $crumb .= "<li class='current_b'>$breadcrumb</li>"; // . $separator;
            }
            $i++;
        }
        $crumb .= "</ul></div>";
        return $crumb;
    }

    public static function getHtmlSelectOptionsAdv($options, $selected, $nice_labels = false, $title)
    {
        $html = '';
        $html = '<select style="display:none;">';
        $html2 = '<div class="custom dropdown"><a href="#" class="current">' . $title . '</a><a href="#" class="selector"></a><ul>';
        foreach ($options as $key => $option) {
            $value = $nice_labels ? $key : $option;
            $ch = ($value == $selected) ? ' selected' : '';
            $html .= "<option" . $ch . " value=" . $value . ">" . $option . "</option>";
            $html2 .= "<li>$option</li>";
        }
        $html .= "</select>";
        $html2 .= "</ul></div>";
        $html = $html . $html2;
        return $html;
    }

    public static function getHtmlLicenseDropdown($selected = '')
    {
        $html = '<select id="licensedd" name="license">';
        $licenses = json_decode(file_get_contents(app_path() . '/other/licenses.json'));
        foreach ($licenses as $license) {
            $value = $license->id;
            $option = $license->name;
            $ch = (trim($value) == trim($selected)) ? ' selected' : '';
            $html .= "<option" . $ch . " value=" . $value . ">" . $option . "</option>";
        }
        $html .= '</select>';
        return $html;
    }

    public static function getHtmlSelectOptions($options, $selected, $nice_labels = false, $custom = false)
    {
        $html = '';
        if (!$custom) {
            foreach ($options as $key => $option) {
                $value = $nice_labels ? $key : $option;
                $ch = (trim($value) == trim($selected)) ? ' selected' : '';
                $html .= "<option" . $ch . " value=" . $value . ">" . $option . "</option>";
            }
        } else {
            $html = '<select style="display:none;">';
            $html2 = '<div class="custom dropdown"><a href="#" class="selector"></a><ul>';
            foreach ($options as $key => $option) {
                $value = $nice_labels ? $key : $option;
                $ch = ($value == $selected) ? ' selected' : '';
                $html .= "<option" . $ch . " value=" . $value . ">" . $option . "</option>";
                $html2 .= "<li>$option</li>";
            }
            $html .= "</select>";
            $html2 .= "</ul></div></div>";
            $html = $html . $html2;
        }
        return $html;
    }

    // functions from Transvision

    /**
     * Split a sentence in words from longest to shortest
     *
     * @param string $sentence
     * @return array all the words in the sentence sorted by length
     */
    public static function uniqueWords($sentence)
    {
        $words = explode(' ', $sentence);
        $words = array_filter($words); // filter out extra spaces
        $words = array_unique($words); // remove duplicate words
        // sort words from longest to shortest
        usort(
            $words,
            function ($a, $b) {
                return mb_strlen($b) - mb_strlen($a);
            }
        );

        return $words;
    }


    /**
     * Nicely format entities for tables by splitting them in subpaths and styling them
     *
     * @param string $entity
     * @param boolean $highlight Optional. Default to false. Use a highlighting style
     * @return string Entity reformated with html markup and css classes for styling
     */
    public static function formatEntity($entity, $highlight = false)
    {
        // let's analyse the entity for the search string
        $chunk = explode(':', $entity);

        if ($highlight) {
            $entity = array_pop($chunk);
            $highlight = preg_quote($highlight, '/');
            $entity = preg_replace("/($highlight)/i", '<span class="highlight">$1</span>', $entity);
            $entity = '<span class="resred">' . $entity . '</span>';
        } else {
            $entity = '<span class="resred">' . array_pop($chunk) . '</span>';
        }
        // let's analyse the entity for the search string
        $chunk = explode('/', $chunk[0]);
        $repo = '<span class="resgreen">' . array_shift($chunk) . '</span>';

        $path = implode('<span class="superset">&nbsp;&sup;&nbsp;</span>', $chunk);

        return $repo . '<span class="superset">&nbsp;&sup;&nbsp;</span>' . $path . '<br>' . $entity;
    }

    public function createUrl($params)
    {
        $url = "index.php?option=com_webapp";
        foreach ($params as $key => $value) {
            $url .= '&' . $key . '=' . $value;
        }
        return $url;
    }

    /**
     * Hightlight specific elements in the string for locales.
     * Can also highlight specific per locale sub-strings.
     * For example in French non-breaking spaces used in typography
     *
     * @param string $string Source text
     * @param string $locale Optional. Locale code. Defaults to French.
     * @return string Same string with specific sub-strings in span elements
     * for styling with CSS (.hightlight-gray class)
     */
    public static function highlight($string, $locale = 'fr')
    {
        $replacements = array(
            ' ' => '<span class="highlight-gray"> </span>',
            '…' => '<span class="highlight-gray">…</span>',
        );

        switch ($locale) {
            case 'fr':
            default:
                $replacements['&hellip;'] = '<span class="highlight-gray">…</span>'; // right ellipsis highlight
                break;
        }

        return self::multipleStringReplace($replacements, $string);
    }


    /**
     * Returns a string after replacing all the items provided in an array
     *
     * @param array $replacements List of replacements to do as :
     * ['before1' => 'after1', 'before2' => 'after2']
     * @param string $string The string to process
     * @return string Processed string
     */
    public static function multipleStringReplace($replacements, $string)
    {
        return str_replace(array_keys($replacements), $replacements, $string);
    }

    /**
     * This method surrounds a searched term by ←→ so as to nbe used together
     * with highlightString() and replace those by spans.
     *
     * @param string $needle The term we when to find and mark for highlighting
     * @param string $haystack The string we search in
     * @return string The original string with the searched term surronded by arrows
     */
    public static function markString($needle, $haystack)
    {
        $str = str_replace($needle, '←' . $needle . '→', $haystack);
        $str = str_replace(ucwords($needle), '←' . ucwords($needle) . '→', $str);
        $str = str_replace(strtolower($needle), '←' . strtolower($needle) . '→', $str);

        return $str;
    }

    /**
     * Highlight searched terms in a string that were marked by markString()
     *
     * @param string $str String with marked items to highlight
     * @return string html with searched terms in <span class="hightlight">
     */
    public static function highlightString($str)
    {
        $str = preg_replace(
            '/←←←(.*)→→→/isU',
            "<span class='highlight'>$1</span>",
            $str
        );

        $str = preg_replace(
            '/←←(.*)→→/isU',
            "<span class='highlight'>$1</span>",
            $str
        );

        $str = preg_replace(
            '/←(.*)→/isU',
            "<span class='highlight'>$1</span>",
            $str
        );

        // remove last ones
        $str = str_replace(['←', '→'], '', $str);

        return $str;
    }


    static function getStatusList($selected, $idcode, $lang = 'english')
    {

        $statuslist = array();
//	$statuslist = $ci->db->query("SELECT id as value, statsel as text, display_color, color FROM status WHERE display_only = 0 ORDER BY ordering");
        $statuslist = TranslationStatus::Model()->findAll();
        $html = "<select name='$selected' id='$idcode' class='stat inputbox'>";
        foreach ($statuslist as $value) {
            $html .= "<option style='background-color:$value->display_color color:$value->color' value='$value->id'";
            if ($selected == $value->id) {
                $html .= " selected='yes'";
            }
            if ($value->id == 2) {
                $html .= " disabled='true'";
            }
            $stattext = $value->status_display;
            $html .= ">$stattext</option>";
        }
        $html .= "</select>";
        return $html;
    }

    static function limit_chars($message, $position)
    {
        return substr($message, 0, $position) . "&hellip;";
    }

    static function checkPlurales($text, $PluralRuleCount)
    {
        $plurals = split(';', $text);
        if (count($plurals) == $PluralRuleCount) {
            foreach ($plurals as $plural) {
                $len_a = strlen($plural);
                $len_b = strlen(ltrim($plural));
                if ($len_a <> $len_b) {
                    return false;
                }
            }
            return $plurals;
        } else {
            return false;
        }

    }

    static function wp_check_invalid_utf8($string, $strip = false)
    {
        $string = (string)$string;

        if (0 === strlen($string)) {
            return '';
        }

        // Store the site charset as a static to avoid multiple calls to backpress_get_option()
        static $is_utf8;
        if (!isset($is_utf8)) {
            $is_utf8 = true; //in_array( backpress_get_option( 'charset' ), array( 'utf8', 'utf-8', 'UTF8', 'UTF-8' ) );
        }
        if (!$is_utf8) {
            return $string;
        }

        // Check for support for utf8 in the installed PCRE library once and store the result in a static
        static $utf8_pcre;
        if (!isset($utf8_pcre)) {
            $utf8_pcre = @preg_match('/^./u', 'a');
        }
        // We can't demand utf8 in the PCRE installation, so just return the string in those cases
        if (!$utf8_pcre) {
            return $string;
        }

        // preg_match fails when it encounters invalid UTF8 in $string
        if (1 === @preg_match('/^./us', $string)) {
            return $string;
        }

        // Attempt to strip the bad chars if requested (not recommended)
        if ($strip && function_exists('iconv')) {
            return iconv('utf-8', 'utf-8', $string);
        }

        return '';
    }


    /**
     * Escaping for HTML attributes.
     *
     * @since 2.8.0
     *
     * @param string $text
     *
     * @return string
     */
    public static function esc_attr($text)
    {
        $safe_text = self::wp_check_invalid_utf8($text);
        $safe_text = _wp_specialchars($safe_text, ENT_QUOTES);
        return $safe_text;
    }

    public static function prepare_original($text)
    {
        $text = str_replace(
            array("\r", "\n"),
            "<span class='invisibles' title='" . self::esc_attr('New line') . "'>&crarr;</span>\n",
            $text
        );
        $text = str_replace(
            "\t",
            "<span class='invisibles' title='" . self::esc_attr('Tab character') . "'>&rarr;</span>\t",
            $text
        );
        return $text;
    }

    /**
     * Escaping for HTML blocks
     *
     * @deprecated 2.8.0
     * @see esc_html()
     */
    static function wp_specialchars($string, $quote_style = ENT_NOQUOTES, $charset = false, $double_encode = false)
    {
        if (func_num_args() > 1) { // Maintain backwards compat for people passing additional args
            $args = func_get_args();
            return call_user_func_array('_wp_specialchars', $args);
        } else {
            return esc_html($string);
        }
    }

    /**
     * Converts a number of HTML entities into their special characters.
     *
     * Specifically deals with: &, <, >, ", and '.
     *
     * $quote_style can be set to ENT_COMPAT to decode " entities,
     * or ENT_QUOTES to do both " and '. Default is ENT_NOQUOTES where no quotes are decoded.
     *
     * @since 2.8
     *
     * @param string $string The text which is to be decoded.
     * @param mixed $quote_style Optional. Converts double quotes if set to ENT_COMPAT, both single and double if set to ENT_QUOTES or none if set to ENT_NOQUOTES. Also compatible with old _wp_specialchars() values; converting single quotes if set to 'single', double if set to 'double' or both if otherwise set. Default is ENT_NOQUOTES.
     *
     * @return string The decoded text without HTML entities.
     */
    function wp_specialchars_decode($string, $quote_style = ENT_NOQUOTES)
    {
        $string = (string)$string;

        if (0 === strlen($string)) {
            return '';
        }

        // Don't bother if there are no entities - saves a lot of processing
        if (strpos($string, '&') === false) {
            return $string;
        }

        // Match the previous behaviour of _wp_specialchars() when the $quote_style is not an accepted value
        if (empty($quote_style)) {
            $quote_style = ENT_NOQUOTES;
        } elseif (!in_array($quote_style, array(0, 2, 3, 'single', 'double'), true)) {
            $quote_style = ENT_QUOTES;
        }

        // More complete than get_html_translation_table( HTML_SPECIALCHARS )
        $single = array('&#039;' => '\'', '&#x27;' => '\'');
        $single_preg = array('/&#0*39;/' => '&#039;', '/&#x0*27;/i' => '&#x27;');
        $double = array('&quot;' => '"', '&#034;' => '"', '&#x22;' => '"');
        $double_preg = array('/&#0*34;/' => '&#034;', '/&#x0*22;/i' => '&#x22;');
        $others = array(
            '&lt;' => '<',
            '&#060;' => '<',
            '&gt;' => '>',
            '&#062;' => '>',
            '&amp;' => '&',
            '&#038;' => '&',
            '&#x26;' => '&'
        );
        $others_preg = array(
            '/&#0*60;/' => '&#060;',
            '/&#0*62;/' => '&#062;',
            '/&#0*38;/' => '&#038;',
            '/&#x0*26;/i' => '&#x26;'
        );

        if ($quote_style === ENT_QUOTES) {
            $translation = array_merge($single, $double, $others);
            $translation_preg = array_merge($single_preg, $double_preg, $others_preg);
        } elseif ($quote_style === ENT_COMPAT || $quote_style === 'double') {
            $translation = array_merge($double, $others);
            $translation_preg = array_merge($double_preg, $others_preg);
        } elseif ($quote_style === 'single') {
            $translation = array_merge($single, $others);
            $translation_preg = array_merge($single_preg, $others_preg);
        } elseif ($quote_style === ENT_NOQUOTES) {
            $translation = $others;
            $translation_preg = $others_preg;
        }

        // Remove zero padding on numeric entities
        $string = preg_replace(array_keys($translation_preg), array_values($translation_preg), $string);

        // Replace characters according to translation table
        return strtr($string, $translation);
    }

    /**
     * Escaping for HTML blocks.
     *
     * @since 2.8.0
     *
     * @param string $text
     *
     * @return string
     */
    function esc_html($text)
    {
        $safe_text = self::wp_check_invalid_utf8($text);
        $safe_text = self::_wp_specialchars($safe_text, ENT_QUOTES);
        //return apply_filters( 'esc_html', $safe_text, $text );
        return $text;
    }

    /**
     * Similar to esc_html() but allows double-encoding.
     */
    public static function esc_translation($text)
    {
        return self::wp_specialchars($text, ENT_NOQUOTES, false, true);
    }

    public static function makeClickableLinks($text)
    {

        /*$text = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)',
          '<a href="\\1">\\1</a>', $text);
        $text = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&//=]+)',
          '\\1<a href="http://\\2">\\2</a>', $text);
        $text = eregi_replace('([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})',
          '<a href="mailto:\\1">\\1</a>', $text);*/
        $text = preg_replace(
            '/\[([^\]]+)\]\((((f|ht){1}tp:\/\/)[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)\)/i',
            '<a href="\\2" target="_blank">\\1</a>',
            $text
        );
        $text = preg_replace(
            '/(^|[^"])(((f|ht){1}tp:\/\/)[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i',
            '\\1<a href="\\2" target="_blank">\\2</a>',
            $text
        );
        return $text;

    }

    public static function progressbar($total, $done, $label, $noStripe = "")
    {
        if ($total == 0) {
            $percentageDone = '0%';
        } else {
            $percentageDone = intval($done / $total * 100) . '%';
        }
        switch ($percentageDone) {
            case ($percentageDone <= 25):
                //$class = 'red';
                $class = 'progress-danger';
                $spanclass = '';
                break;
            case ($percentageDone <= 50):
                $class = 'progress-yellow';
                $spanclass = '';
                break;
            case ($percentageDone <= 99):
                $class = 'progress-orange';
                $spanclass = '';
                break;
            default:
                $class = 'progress-success';
                $spanclass = 'class="completed"';
                break;
        }
        $html = "<div class='progress $class $noStripe'>";
        $html .= "<div class='bar' style='width: $percentageDone'></div>";
        //$html .= "<span>517/600</span>";
        $html .= "</div";
        $html .= '<span class="badge" style="padding: 3px; float: left; width: 25px; text-align: center;">10%</span>';
        $html = '<div id="coolstuff" style="margin-top: 10px;">
            <span class="badge" style="padding: 3px; float: right; width: auto; text-align: center;">' . $percentageDone . '</span>
            <div class="progress ' . $class . ' ' . $noStripe . '" id="prgbar">
                <div title="PO Details" class="bar" style="width: ' . $percentageDone . ';" id="prgwidth"> Add New PO Detail </div>
            </div><!-- end of progress bar -->
        </div> <!-- end of cool stuff -->';
        return $html;
    }

    public static function percent($total, $done, $precision = false)
    {
        if ($total == 0) {
            $percentageDone = '0%';
        } else {
            if (!$precision) {
                $percentageDone = intval($done / $total * 100) . '%';
            } else {
                $percentageDone = round($done / $total * 100, $precision) . '%';
            }
        }
        return $percentageDone;
    }

    function shortentext($input, $length = 20, $ellipses = true, $strip_html = true)
    {

        //strip tags, if desired
        if ($strip_html) {
            $input = strip_tags($input);
        }

        //no need to trim, already shorter than trim length
        if (strlen($input) <= $length) {
            return $input;
        }

        //find last space within length
        $last_space = strrpos(substr($input, 0, $length), ' ');
        $trimmed_text = substr($input, 0, $last_space);

        //add ellipses (...)
        if ($ellipses) {
            $trimmed_text .= 'â€¦';
        }

        return $trimmed_text;
    }

    public static function get_rdf_file($file)
    {
        $rdf_info["valid"] = false;
        $rdf_info = WtsHelper::fill_rdf_info($file, $rdf_info);
        return $rdf_info;
    }

    public static function fill_rdf_info($fileName, $rdf_info)
    {
        $rdf = "none";
        if (file_exists($fileName)) {
            $fileSize = filesize($fileName);
            $rdf = file_get_contents($fileName);
            if ($rdf != "none") {
                $rdf_info["valid"] = true;
                $rdf_info["manifestdata"] = WtsHelper::parse_install_manifest($rdf);
                $rdf_info["content"] = $rdf;
                $rdf_info["filesize"] = $fileSize;
            }
        }
        return $rdf_info;
    }

    public static function parse_install_manifest($manifestdata)
    {
        $data = array();
        include('class_rdf_parser.php');
        $rdf = new Rdf_parser();
        $rdf->rdf_parser_create(null);
        $rdf->rdf_set_user_data($data);
        $rdf->rdf_set_statement_handler("my_statement_handler");
        $rdf->rdf_set_warning_handler("my_warning_handler");
        $rdf->rdf_set_base("");
        if (!$rdf->rdf_parse($manifestdata, strlen($manifestdata), true)) {
            return null;
        }
        // now set the targetApplication data for real
        $tarray = array();
        if (array_key_exists("targetApplication", $data["manifest"])
            && is_array($data["manifest"]["targetApplication"])
        ) {
            foreach ($data["manifest"]["targetApplication"] as $ta) {
                //printf("Element %s\n", $data[0]);
                $id = $data[$ta][EM_NS . "id"][0];
                $minVer = $data[$ta][EM_NS . "minVersion"][0];
                $maxVer = $data[$ta][EM_NS . "maxVersion"][0];
                $tarray[$id]["minVersion"] = $minVer;
                $tarray[$id]["maxVersion"] = $maxVer;
            }
        }
        $data["manifest"]["targetApplication"] = $tarray;

        // now set the file data for real
        $file_array = array();
        $locale = array();
        $package = "";
        $skin = array();
        $chrome_path = "";
        if (array_key_exists("file", $data["manifest"])
            && is_array($data["manifest"]["file"])
        ) {
            $chrome_path = $data["manifest"]["file"][0];

            foreach ($data["manifest"]["file"] as $ta) {
                $package = $data[$ta][EM_NS . "package"][0];
                if (array_key_exists(EM_NS . "skin", $data[$ta])) {
                    $skin = $data[$ta][EM_NS . "skin"];
                }
                if (array_key_exists(EM_NS . "locale", $data[$ta])) {
                    $locale = $data[$ta][EM_NS . "locale"];
                }
            }
        }
        $file_array["package"] = $package;
        $file_array["chromePath"] = $chrome_path;
        $file_array["skin"] = $skin;
        $data["manifest"]["file"] = $file_array;
        $data["manifest"]["locale"] = $locale;

        // now set the localized data for real
        $tarray = array();
        if (array_key_exists("localized", $data["manifest"])
            && is_array($data["manifest"]["localized"])
        ) {
            // See http://developer.mozilla.org/en/docs/Install_Manifests#localized
            // for supported attributes
            $attr = Array(
                "name",
                "description",
                "creator",
                "homepageURL",
                "developer",
                "translator",
                "contributor"
            );

            foreach ($data["manifest"]["localized"] as $ta) {
                $locale = $data[$ta][EM_NS . "locale"][0];
                foreach ($attr as $a) {
                    if (array_key_exists(EM_NS . $a, $data[$ta])) {
                        $value = $data[$ta][EM_NS . $a][0];
                        $tarray[$locale][$a] = $value;
                    }
                }
            }
        }
        $data["manifest"]["localized"] = $tarray;
        $requires = array();
        if (array_key_exists("requires", $data["manifest"])
            && is_array($data["manifest"]["requires"])
        ) {
            // See http://wiki.mozilla.org/Extension_Manager:Extension_Dependencies
            $attr = array(
                "id",
                "minVersion",
                "maxVersion",
                "name",
                "homepageURL",
                "updateURL"
            );
            foreach ($data["manifest"]["requires"] as $ta) {
                $requireApp = $data[$ta][EM_NS . "id"][0];
                foreach ($attr as $a) {
                    if (array_key_exists(EM_NS . $a, $data[$ta])) {
                        $value = $data[$ta][EM_NS . $a][0];
                        $requires[$requireApp][$a] = $value;
                    }
                }
            }
        }

        $data["manifest"]["requires"] = $requires;

        $rdf->rdf_parser_free();


        return $data["manifest"];
    }


    public static function get_safe_value($arr, $field_name)
    {
        if (array_key_exists($field_name, $arr)) {
            return $arr[$field_name];
        }
        return "";
    }

    public static function get_contributor_by_attr($manifestdata, $attr)
    {
        if (array_key_exists("contributor", $manifestdata)) {
            $lc_attr = strtolower($attr);

            foreach ($manifestdata["contributor"] as $key => $val) {
                $contrib = $manifestdata["contributor"][$key];
                $lc_contrib = strtolower($contrib);
                $pos = strpos($lc_contrib, $lc_attr);
                if ($pos) {
                    return substr($contrib, 0, $pos);
                }
            }
        }

        return "";
    }


    public static function convertDate2String($inputDate, $dateFormat = 1)
    {
        /*
        @format
        1 - January 1, 1970 12:00:00 AM/PM  # full date and 12 hour format (default)
        2 - January 1, 1970 23:00:00   # full date and 24 hour format
        3 - Jan 1, 1970 12:00:00 AM/PM  #short date and 12 hour format
        4 - Jan 1, 1970 24:00:00 # short date and 24 hour format
        */
        switch ($dateFormat) {
            case 1:
                $ds = date('F d, Y h:i:s A', strtotime($inputDate));
                break;

            case 2:
                $ds = date('F d, Y G:i:s', strtotime($inputDate));
                break;

            case 3:
                $ds = date('M d, Y h:i:s A', strtotime($inputDate));
                break;

            case 4:
                $ds = date('M d, Y G:i:s', strtotime($inputDate));
                break;
        }
        die($ds);
        //str_replace(" ","_",$ds);
        die(str_replace(" ", "_", $ds));
    }

    /**
     * Create URL Title
     *
     * Takes a "title" string as input and creates a
     * human-friendly URL string with either a dash
     * or an underscore as the word separator.
     *
     * @access    public
     *
     * @param    string    the string
     * @param    string    the separator: dash, or underscore
     *
     * @return    string
     */

    public static function url_title($str, $separator = 'dash', $lowercase = false)
    {
        $replace = $separator == '-'; //'dash' ? '-' : '_';

        $trans = array(
            '&.+?;' => '',
            '[^a-z0-9 _-]' => '',
            '\s+' => $replace,
            $replace . '+' => $replace
        );

        $str = strip_tags($str);

        foreach ($trans as $key => $val) {
            $str = preg_replace("#" . $key . "#i", $val, $str);
        }

        if ($lowercase === true) {
            $str = strtolower($str);
        }

        return trim($str, $replace);
    }

    public static function url_title_ext($string, $delimiter = '-')
    {
        $string = strtr(
            $string,
            array
            (
                'Å ' => 'S',
                'Å¡' => 's',
                'Ä' => 'Dj',
                'Ä‘' => 'dj',
                'Å½' => 'Z',
                'Å¾' => 'z',
                'ÄŒ' => 'C',
                'Ä' => 'c',
                'Ä†' => 'C',
                'Ä‡' => 'c',
                'Ã€' => 'A',
                'Ã' => 'A',
                'Ã‚' => 'A',
                'Ãƒ' => 'A',
                'Ã„' => 'A',
                'Ã…' => 'A',
                'Ã†' => 'A',
                'Ã‡' => 'C',
                'Ãˆ' => 'E',
                'Ã‰' => 'E',
                'ÃŠ' => 'E',
                'Ã‹' => 'E',
                'ÃŒ' => 'I',
                'Ã' => 'I',
                'ÃŽ' => 'I',
                'Ã' => 'I',
                'Ã‘' => 'N',
                'Ã’' => 'O',
                'Ã“' => 'O',
                'Ã”' => 'O',
                'Ã•' => 'O',
                'Ã–' => 'O',
                'Ã˜' => 'O',
                'Ã™' => 'U',
                'Ãš' => 'U',
                'Ã›' => 'U',
                'Ãœ' => 'U',
                'Ã' => 'Y',
                'Ãž' => 'B',
                'ÃŸ' => 'Ss',
                'Ã ' => 'a',
                'Ã¡' => 'a',
                'Ã¢' => 'a',
                'Ã£' => 'a',
                'Ã¤' => 'a',
                'Ã¥' => 'a',
                'Ã¦' => 'a',
                'Ã§' => 'c',
                'Ã¨' => 'e',
                'Ã©' => 'e',
                'Ãª' => 'e',
                'Ã«' => 'e',
                'Ã¬' => 'i',
                'Ã­' => 'i',
                'Ã®' => 'i',
                'Ã¯' => 'i',
                'Ã°' => 'o',
                'Ã±' => 'n',
                'Ã²' => 'o',
                'Ã³' => 'o',
                'Ã´' => 'o',
                'Ãµ' => 'o',
                'Ã¶' => 'o',
                'Ã¸' => 'o',
                'Ã¹' => 'u',
                'Ãº' => 'u',
                'Ã»' => 'u',
                'Ã½' => 'y',
                'Ã½' => 'y',
                'Ã¾' => 'b',
                'Ã¿' => 'y',
                'Å”' => 'R',
                'Å•' => 'r',
            )
        );
        //return \Fuel\Core\Inflector::friendly_title($string, $delimiter, true);
        return WtsHelper::url_title($string, $delimiter, true);
    }

    public static function extractLocaleNames($locales)
    {
        $en_pos = false;
        foreach ($locales as $locale) {
            $loc = explode('/', $locale);
            if ($en_pos === false) {
                $en_pos = array_search('en-US', $loc);
            }
        }
        if ($en_pos === false) {
            foreach ($locales as $locale) {
                $loc = explode('/', $locale);
                if ($en_pos === false) {
                    $en_pos = array_search('en', $loc);
                }
            }
        }
        if ($en_pos === false) {
            return false;
        } else {
            $loc_array = array();
            foreach ($locales as $locale) {
                $tmp_arr = explode('/', $locale);
                $loc_array[] = $tmp_arr[$en_pos];
            }
            return $loc_array;
        }
    }

    public static function getJar($path, $fromManifest = true, $chromepath = '')
    {
        $path = trim($path);
        //	echo "<b>Path:$path</b><br>";
        if (!$fromManifest) {
            $pathparts = split(":", $chromepath);
            $pinfo = pathinfo($pathparts[count($pathparts) - 1]);
            //print_r($pinfo);
            //$jar[locpath] = "chrome".DS;
            $jar['jarpath'] = "chrome" . DS;
            if ($pinfo['dirname'] <> '.') {
                $jar['locpath'] .= $pinfo['dirname'];
            }
            if ($pinfo['extension'] == 'jar') {
                $jar['jarname'] = $pinfo['basename'];
            }
            //$locpath = split("xx-XX",$path);
            $locpath = preg_split("/xx-XX/", $path);
            $jar['locpath'] .= DS . $locpath[0];
            $jar['addpath'] = "xx-XX" . $locpath[1];
            if ($pinfo['dirname'] <> '.') {
                $jar['jarpath'] .= $pinfo['dirname'];
            }
            //$jar[jarpath] = $pinfo['dirname'];//print_r($pinfo);
            return $jar;
        } else {
            if (strpos($path, "jar:") === 0) {
                $arr = split("!", $path);
                $jarpath = substr($arr[0], 4);
                //$jar[path] = dirname($jarpath);
                $jar['jarname'] = basename($jarpath);
                //$locpath = split("xx-XX",$arr[1]);
                $locpath = preg_split("/xx-XX/", $arr[1]);
                //print_r($locpath);
                $jar['jarpath'] = dirname($jarpath);
                $jar['locpath'] = dirname($jarpath) . $locpath[0];
                $jar['addpath'] = "xx-XX" . $locpath[1];
            } else {
                //$locpath = split("xx-XX",$path);
                $locpath = preg_split("/xx-XX/", $path);
                $jar['locpath'] = $locpath[0];
                $jar['addpath'] = "xx-XX" . $locpath[1];
            }
        }
        return $jar; //basename($arr[0]);
    }

    public static function trailingslashit($string)
    {
        return self::untrailingslashit($string) . '/';
    }

    public static function untrailingslashit($string)
    {
        return rtrim($string, '/');
    }

    public static function removeDoubleSlashes($string)
    {
        return str_replace('//', '/', $string);
    }

    public static function searchBZextOnAMO($project) //($term, $extguid = false, $language = 'en-US')
    {
        error_reporting(0);
        print_r($project);
        $amo = $this->get_where(array('project_id' => $this->project_id, 'langname' => $this->queryLang));
        $days_since_update = round(abs(strtotime('now') - strtotime($project['last_update'])) / 86400);
        die($days_since_update);
        $term = urlencode($term);
        $ch = curl_init();
        $sApp = 'firefox';

        //$lang = $this->queryLang;
        //die("https://services.addons.mozilla.org/$language/$sApp/api/1.3/search/$term/extension");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)");
        curl_setopt(
            $ch,
            CURLOPT_URL,
            "https://services.addons.mozilla.org/$language/$sApp/api/1.3/search/$term/extension"
        );
        //curl_setopt($ch, CURLOPT_URL, "https://services.addons.mozilla.org/en-US/firefox/api/1.3/search/we-care+reminder/extension");
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //$extguid = "wecarereminder@bryan";
        // $output contains the output string
        $output = curl_exec($ch);
        if (curl_errno($ch)) {
            $this->errorMsg = 'cURL-Error: ';
            $this->error = curl_error($ch);
            curl_close($ch);
            return false;
        }
        // close curl resource to free up system resources
        curl_close($ch);
        $searchresult = self::BZxml2array($output);
        $results = intval($searchresult['searchresults']['attr']['total_results']);
        switch ($results) {
            case 0:
                echo "Extension not found on AMO";
                break;
            case 1:
                print_r($searchresult);
                die();
                $addoninfo[0] = $searchresult['searchresults']['addon'];
                break;
            default:
                $addoninfo = $searchresult['searchresults']['addon'];
                break;
        }
        foreach ($addoninfo AS $addon) {
            if ($addon['guid']['value'] === $extguid) {
                $naddon['addon'] = $addon;
                return (self::buildInfo($naddon));
            }
        }
    }

    public static function BZxml2array($contents, $get_attributes = 1)
    {
        /**
         * xml2array() will convert the given XML text to an array in the XML structure.
         * Link: http://www.bin-co.com/php/scripts/xml2array/
         * Arguments : $contents - The XML text
         * $get_attributes - 1 or 0. If this is 1 the function will get the attributes as well as the tag values - this results in a different array structure in the return value.
         * Return: The parsed XML in an array form.
         */
        if (!$contents) {
            return array();
        }
        if (!function_exists('xml_parser_create')) {
            return array();
        }
        //Get the XML parser of PHP - PHP must have this module for the parser to work
        $parser = xml_parser_create();
        xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
        xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
        xml_parse_into_struct($parser, $contents, $xml_values);
        xml_parser_free($parser);
        if (!$xml_values) {
            return;
        } //Hmm...
        //Initializations
        $xml_array = array();
        $parents = array();
        $opened_tags = array();
        $arr = array();

        $current = & $xml_array;

        //Go through the tags.
        foreach ($xml_values as $data) {
            unset($attributes, $value); //Remove existing values, or there will be trouble

            //This command will extract these variables into the foreach scope
            // tag(string), type(string), level(int), attributes(array).
            extract($data); //We could use the array by itself, but this cooler.

            $result = '';
            if ($get_attributes) { //The second argument of the function decides this.
                $result = array();
                if (isset($value)) {
                    $result['value'] = $value;
                }

                //Set the attributes too.
                if (isset($attributes)) {
                    foreach ($attributes as $attr => $val) {
                        if ($get_attributes == 1) {
                            $result['attr'][$attr] = $val;
                        } //Set all the attributes in a array called 'attr'
                        /** :TODO: should we change the key name to '_attr'? Someone may use the tagname 'attr'. Same goes for 'value' too */
                    }
                }
            } elseif (isset($value)) {
                $result = $value;
            }

            //See tag status and do the needed.
            if ($type == "open") { //The starting of the tag "
                $parent[$level - 1] = & $current;

                if (!is_array($current) or (!in_array($tag, array_keys($current)))) { //Insert New tag
                    $current[$tag] = $result;
                    $current = & $current[$tag];
                } else { //There was another element with the same tag name
                    if (isset($current[$tag][0])) {
                        array_push($current[$tag], $result);
                    } else {
                        $current[$tag] = array($current[$tag], $result);
                    }
                    $last = count($current[$tag]) - 1;
                    $current = & $current[$tag][$last];
                }

            } elseif ($type == "complete") { //Tags that ends in 1 line "
                //See if the key is already taken.
                if (!isset($current[$tag])) { //New Key
                    $current[$tag] = $result;
                } else { //If taken, put all things inside a list(array)
                    if ((is_array($current[$tag]) and $get_attributes == 0) //If it is already an arrayâ€¦
                        or (isset($current[$tag][0]) and is_array($current[$tag][0]) and $get_attributes == 1)
                    ) {
                        array_push($current[$tag], $result); // â€¦push the new element into that array.
                    } else { //If it is not an arrayâ€¦
                        $current[$tag] = array(
                            $current[$tag],
                            $result
                        ); //â€¦Make it an array using using the existing value and the new value
                    }
                }
            } elseif ($type == 'close') { //End of tag "
                $current = & $parent[$level - 1];
            }
        }
        return ($xml_array);
    }

    private static function buildInfo($amo)
    {
        error_reporting(0);
        $amoInfo = array();
        if (count($amo['addon']['authors']['author']) > 1) {
            foreach ($amo['addon']['authors']['author'] AS $author) {
                $authorlist[] = $author['value'];
            }
            $amoInfo->author = implode(', ', $authorlist);
        } else {
            $amoInfo['author'] = $amo['addon']['authors']['author']['value'];
        }
        echo "<pre>";
        var_dump($amoInfo);
        var_dump($amo);
        echo "</pre>";
        //die();
        //$amoInfo['BZid'] = $this->project_id;
        $amoInfo['amoid'] = $amo['addon']['attr']['id'];
        $amoInfo['version'] = $amo['addon']['version']['value'];
        $amoInfo['guid'] = $amo['addon']['guid']['value'];
        $amoInfo['rating'] = $amo['addon']['rating']['value'];
        $amoInfo['name'] = $amo['addon']['name']['value'];
        $amoInfo['thumbnail'] = $amo['addon']['thumbnail']['value'];
        $amoInfo['install'] = $amo['addon']['install']['value'];
        $amoInfo['summary'] = $amo['addon']['summary']['value'];
        $amoInfo['eula_text'] = $amo['addon']['eula']['value'];
        $amoInfo['description'] = $amo['addon']['description']['value'];
        $amoInfo['icon'] = $amo['addon']['icon']['value'];
        $amoInfo['license_name'] = $amo['addon']['license']['name']['value'];
        $amoInfo['license_url'] = $amo['addon']['license']['url']['value'];
        return $amoInfo;
        //$this->amoInfo = $amoInfo;
        //if($this->save_entry) $this->save_data();
    }

    public static function saveAMO($amodata, $language = 'en-US')
    {
        error_reporting(0);
        //$amoentry = new \Wts\Model_Extension_Amoentry;
        $amoentry->language_id = $amodata['language_id'];
        $amoentry->project_id = $amodata['project_id'];
        $amoentry->summary = $amodata['summary'];
        $amoentry->authors = $amodata['author'];
        $amoentry->amoid = $amodata['amoid'];
        $amoentry->version = $amodata['version'];
        //$amoentry->lang_id = $lang_id;
        $amoentry->langname = $language;
        $amoentry->rating = $amodata['rating'];
        $amoentry->name = $amodata['name'];
        $amoentry->thumbnail = $amodata['thumbnail'];
        $amoentry->install = $amodata['install'];
        $amoentry->description = $amodata['description'];
        $amoentry->icon = $amodata['icon'];
        $amoentry->eula_text = $amodata['eula_text'];
        //if (!$amoentry->eula) $this->eula = 0;
        $amoentry->dev_comment = $amodata['dev_comment'];
        $amoentry->privacy = $amodata['privacy'];
        $amoentry->homepage = $amodata['homepage'];
        $amoentry->version_notes = $amodata['version_notes'];
        $amoentry->license_name = $amodata['license_name'];
        $amoentry->license_url = $amodata['license_url'];
        $amoentry->Save();
        //print_r($amoentry);
    }

    /**
     * Adds a slash after the string, while makes sure not to double it
     * if it already exists
     */
    public static function gp_add_slash($string)
    {
        return rtrim($string, '/') . '/';
    }

    public static function add_leading_slash($string)
    {
        return '/' . trim($string, '/');
    }

    public static function removeDoubleSlash($in)
    {
        return preg_replace('%([^:])([/]{2,})%', '\\1/', $in);
    }

    public static function getRule($language)
    {
        $parsed = simplexml_load_file(
            app_path() . '/i18n/data/temp/common/supplemental/plurals.xml'
        );
        foreach ($parsed->plurals[0]->pluralRules as $xObj) {
            foreach ($xObj->attributes() as $a => $b) {
                $pluralLangs = explode(" ", $b);
                if (in_array($language, $pluralLangs)) {
                    foreach ($xObj->pluralRule as $rule) {
                        $attr = $rule->attributes();
                        $count = $attr['count'];
                        $expr = "$rule";
                        $ruleSet["$count"] = $expr;
                    }
                    return $ruleSet;
                }
            }
        }
        return false;
    }

    public static function getAllrules()
    {
        $parsed = simplexml_load_file(
            app_path() . '/i18n/data/temp/common/supplemental/plurals.xml'
        );
        foreach ($parsed->plurals[0]->pluralRules as $xObj) {
            foreach ($xObj->attributes() as $a => $b) {
                $pluralLangs = explode(" ", $b);
                foreach ($pluralLangs as $pl)
                    foreach ($xObj->pluralRule as $rule) {
                        $test = $rule->attributes();
                        $count = $test['count'];
                        $expr = "$rule";
                        $ruleSet[$pl]["$count"] = $expr;
                    }

            }
        }
        return $ruleSet;
    }

    public function get_gravatar($hash, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array())
    {
        $url = 'https://www.gravatar.com/avatar/';
        $url .= $hash;
        $url .= "?s=$s&d=$d&r=$r";
        if ($img) {
            $url = '<img src="' . $url . '"';
            foreach ($atts as $key => $val)
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }
}
 