<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**-------------------------------------------------------------------------------
 *
 * @link              https://awesomecoder.org/
 * @since             1.0.0
 * @package           YTSHORTDOWNLOADER
 *
 * @laravel-helpers
 *
 * Author:            Md Ibrahim Kholil
 * Author URI:        https://awesomecoder.org/
 *                                                              _
 *                                                             | |
 *    __ ___      _____  ___  ___  _ __ ___   ___  ___ ___   __| | ___ _ __
 *   / _` \ \ /\ / / _ \/ __|/ _ \| '_ ` _ \ / _ \/ __/ _ \ / _` |/ _ \ '__|
 *  | (_| |\ V  V /  __/\__ \ (_) | | | | | |  __/ (_| (_) | (_| |  __/ |
 *   \__,_| \_/\_/ \___||___/\___/|_| |_| |_|\___|\___\___/ \__,_|\___|_|
 *
 *--------------------------------------------------------------------------------*/

if (!function_exists("_ago")) {
    function _ago($datetime, $full = false)
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}

/**
 * Interact with the news percentage.
 *
 * @param  string  $value
 * @return views();
 */
if (!function_exists("views")) {
    function views(object $statistics)
    {
        $views = $statistics->viewCount ? $statistics->viewCount : 0;
        if ($views > 100 && $views < 1000000) {
            return sprintf('%0.1fK', ($views / 1000));
        } else if ($views >= 1000000) {
            return sprintf('%0.1fM', ($views / 1000000));
        }
        return $views;
    }
}

/**
 * Interact with the news percentage.
 *
 * @param  string  $value
 * @return likes();
 */
if (!function_exists("likes")) {
    function likes(object $statistics)
    {
        $like = isset($statistics->likeCount) ? $statistics->likeCount : 0;
        if ($like > 100 && $like < 1000000) {
            return sprintf('%0.1fK', ($like / 1000));
        } else if ($like >= 1000000) {
            return sprintf('%0.1fM', ($like / 1000000));
        }
        return $like;
    }
}

/**
 * Interact with the news percentage.
 *
 * @param  string  $value
 * @return comments();
 */
if (!function_exists("comments")) {
    function comments(object $statistics)
    {
        $comment = isset($statistics->commentCount) ? $statistics->commentCount : 0;
        if ($comment > 100 && $comment < 1000000) {
            return sprintf('%0.1fK', ($comment / 1000));
        } else if ($comment >= 1000000) {
            return sprintf('%0.1fM', ($comment / 1000000));
        }
        return $comment;
    }
}

/**
 * Interact with the news percentage.
 *
 * @param  string  $value
 * @return comments();
 */
if (!function_exists("downloaded")) {
    function downloaded($downloaded)
    {
        $downloaded = ($downloaded != null) ? intval($downloaded) : 0;
        if ($downloaded > 100 && $downloaded < 1000000) {
            return sprintf('%0.1fK', ($downloaded / 1000));
        } else if ($downloaded >= 1000000) {
            return sprintf('%0.1fM', ($downloaded / 1000000));
        }
        return $downloaded;
    }
}

/**
 * Interact with the news percentage.
 *
 * @param  string  $value
 * @return limitString();
 */
if (!function_exists("limitString")) {
    function limitString($string, $limit = 50)
    {
        if (Str::length($string) > $limit) {
            $output = Str::limit($string, $limit);
        } else {
            $output = Str::limit($string, $limit, "");
        }
        return ucfirst($output);
    }
}

/**
 * Interact with the news percentage.
 *
 * @param  string  $value
 * @return encode();
 */
if (!function_exists("encode")) {
    function encode($vid)
    {
        return base64_encode("{$vid}ibrahim");
    }
}

/**
 * Interact with the news percentage.
 *
 * @param  string  $value
 * @return videoType();
 */
if (!function_exists("videoType")) {
    function videoType($video)
    {
        return strtok($video, ";");
    }
}

/**
 * Interact with the news percentage.
 *
 * @param  string  $value
 * @return othersVideoType();
 */
if (!function_exists("othersVideoType")) {
    function othersVideoType($video)
    {
        $file = strtolower(strtok($video, " "));
        return ($file == "mp4") ? "mp4" : false;
    }
}

/**
 * Interact with the news percentage.
 *
 * @param  string  $value
 * @return isVideo();
 */
if (!function_exists("isVideo")) {
    function isVideo($video)
    {
        $file = strtok($video, ";");
        if (empty($file) || ($file == null) || ($file == "")) {
            return false;
        }
        $type = strtok($video, "/");
        if (empty($type) || ($type == null) || ($type == "")) {
            return false;
        }
        return ($type == "video") ? true : false;
    }
}


/**
 * Interact with the news percentage.
 *
 * @param  string  $value
 * @return fileExt();
 */
if (!function_exists("fileExt")) {
    function fileExt($video)
    {
        $file = strtok($video, ";");
        if (empty($file) || ($file == null) || ($file == "")) {
            return false;
        }
        $type = basename($file);
        if (empty($type) || ($type == null) || ($type == "")) {
            return false;
        }
        return $type;
    }
}
