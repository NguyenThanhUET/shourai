<?php

namespace App\Helpers;

/**
 * Created by PhpStorm.
 * User: my computer
 * Date: 6/30/2018
 * Time: 2:05 AM
 */


use App\Entities\DataResultCollection;
use App\Entities\SDBStatusCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CommonHelper
{
    public static function CommonLog($message)
    {
        //Logging
        if (env('APP_DEBUG') == true) {
            abort($message);
        } else {
            Log::error($message);
        }
    }

    public static function getDefaultStorageDiskName()
    {
        return 'public';
    }



    /**
     * @return string
     */
    public static function getExcelTemplatePath()
    {
        return base_path() . '/resources/export_templates/';
    }

    public static function isJSON($string)
    {
        return is_string($string) && is_array(json_decode($string, true)) ? true : false;
    }

    //get Image Src
    public static function getImageSrc($image)
    {
        $src = url('/') . "/common_images/no-image.png";
        if ($image != null && $image != '') {
            $diskLocalName = CommonHelper::getDefaultStorageDiskName();
            $src = Storage::disk($diskLocalName)->url($image);
        }
        return $src;
    }

    //get Image Url
    public static function getImageUrl($imageUri)
    {
        if ($imageUri != null && $imageUri != '') {
            $diskLocalName = CommonHelper::getDefaultStorageDiskName();
            $imageUrl = Storage::disk($diskLocalName)->url($imageUri);
        } else {
            $imageUrl = null;
        }
        return $imageUrl;
    }


    /**
     * @param $data
     * @return array
     * ex:
     * inp:
     * [
     *      key1=>[
     *          key2=>a,
     *          key3=>b,
     *     ],
     *     key4=> c
     * ]
     *  out:
     * [
     *      key1.key2=>a,
     *      key1.key3=>b,
     *      key4=>c
     * ]
     */
    public static function flatten($array, $prefix = '')
    {
        $delimiter = ".";
        $result = array();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = $result + self::flatten($value, $prefix . $key . $delimiter);
            } else {
                $result[$prefix . $key] = $value;
            }
        }
        return $result;
    }

    /**
     * @param $input
     * @return array
     */
    public static function array_non_empty_items($input)
    {
        // If it is an element, then just return it
        if (!is_array($input)) {
            return $input;
        }
        $non_empty_items = array();

        foreach ($input as $key => $value) {
            // Ignore empty cells
            if ((is_array($value) && !empty($value)) || (!is_array($value) && $value)) {
                // Use recursion to evaluate cells
                $non_empty_items[$key] = self::array_non_empty_items($value);
                if (empty($non_empty_items[$key])) {
                    unset($non_empty_items[$key]);
                }
            }
        }

        // Finally return the array without empty items
        return $non_empty_items;
    }

    /**
     * @param $fileList
     * @param $diskName //Disk name in config/filesystem
     * @param $subFolder //Subfolder
     * @param $option //option for cloud upload
     * @return DataResultCollection
     */
    public static function uploadFile($fileList, $diskName, $subFolder, $option): DataResultCollection
    {
        $result = new DataResultCollection();
        $result->status = SDBStatusCode::OK;
        $result->data = array();
        //NOTE : This will store file to path with: root path has config in config/filesystems.php, sub folder is $subFolder
        if (is_array($fileList) && !empty($fileList)) {
            foreach ($fileList as $item) {
                $path = Storage::disk($diskName)->put($subFolder, $item, $option);
                $fileInfor = array(
                    'client_file_name' => $item->getClientOriginalName(),
                    'uri' => $path,
                    'url' => Storage::disk($diskName)->url($path)
                );
                $result->data[] = $fileInfor;
            }
        }
        return $result;
    }

    /**
     * @param $diskName
     * @param $filePath
     * @return DataResultCollection
     */
    public static function deleteFile($diskName, $filePath): DataResultCollection
    {
        $result = new DataResultCollection();
        $result->status = SDBStatusCode::OK;
        $result->data = array();
        Storage::disk($diskName)->delete($filePath);
        return $result;
    }

    public static function generate_string($strength = 7)
    {
        $input = '0123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($input);
        $random_string = '';
        for ($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }


    /**
     * Common log Exception
     *
     * @param \Exception $exception
     * @param bool $returnMsg
     * @return string
     */
    public static function logException(\Exception $exception, $returnMsg = true)
    {
        $msg = $exception->getMessage() . ' on ' . $exception->getFile() . ' Line ' . $exception->getLine();
        Log::error($msg);

        if ($returnMsg) {
            return $msg;
        }
    }

    /**
     * @param $filename ex: a.pdf
     * @return mixed
     */
    public static function getStringName($filename)
    {
        $info = pathinfo($filename);
        return array_get($info, 'filename');
    }


    public static function getExceptionError(\Exception $e)
    {
        if (env('APP_DEBUG') == true) {
            return $e->getMessage() . " in line " . $e->getLine() . "-" . $e->getFile() . "\n" . $e->getTraceAsString();
        } else {
            return "Has error";
        }
    }

    /**
     * @param $filePath
     * @param $fileContent
     * @param string $permission
     * @return bool
     * @throws \Exception
     */
    public static function putToS3($filePath, $fileContent, $permission = 'public')
    {
        return Storage::disk('s3')->put($filePath, $fileContent, $permission);
    }

    /**
     * @param $filename
     */
    public static function deleteFileS3($filePath)
    {
        return Storage::disk('s3')->delete($filePath);
    }

    public static function getListFileOffline($folderPath, $extension)
    {
        $list = null;
        if (is_dir($folderPath)) {
            $list = array_slice(preg_grep('~\.(' . $extension . ')$~', scandir($folderPath)), 0);
        } else {
            Log::error('Path not exists ...');
        }
        return $list;
    }

    public static function curl($url, $isJson = false)
    {
        $referer = "";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_REFERER, $referer);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate,sdch");
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['X-Requested-With: XMLHttpRequest']);
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);

        if ($isJson) {
            return json_decode($response, true);
        }

        return $response;
    }

    public static function containsJapaneseCharacter($str)
    {
        $space = strpos($str, '　');
        $punctuation = preg_match('/[\x{3000}-\x{303F}]/u', $str) > 0;
        $kanji = preg_match('/[\x{4E00}-\x{9FAF}]/u', $str) > 0;
        $hiragana = preg_match('/[\x{3040}-\x{309F}]/u', $str) > 0;
        $katakana = preg_match('/[\x{30A0}-\x{30FF}]/u', $str) > 0 || preg_match('/[\x{FF00}-\x{FFEF}]/u', $str) > 0;
        return $space || $punctuation || $kanji || $hiragana || $katakana;
    }

    public static function trimEnSpaceAndJapaneseSpace($str)
    {
        return CommonHelper::containsJapaneseCharacter($str) ? CommonHelper::trimJpSpace($str) : CommonHelper::trimEnSpace($str);
    }

    private static function trimJpSpace($str)
    {
        $str = preg_replace("/^[\x{3000}\t]+/u", "", $str); // left trim
        $str = preg_replace("/[\x{3000}\t]+$/u", "", $str); // right trim
        return $str;
    }

    private static function trimEnSpace($str)
    {
        return trim($str, " ");
    }

    /**
     * @param $string
     * @return mixed
     */
    public static function escape_like($string)
    {
        $search = array('%', '_');
        $replace = array('\%', '\_');
        return str_replace($search, $replace, $string);
    }


    /**
     * Trim space, tab
     * @param string $value
     * @return string
     */
    public static function trimSpace($value)
    {
        mb_internal_encoding('UTF-8');
        mb_regex_encoding('UTF-8');
        $value = mb_ereg_replace("^[\n\r\s\t　]+", '', $value);
        $value = mb_ereg_replace("[\n\r\s\t　]+$", '', $value);
        $value = trim($value);
        return $value;
    }
}
