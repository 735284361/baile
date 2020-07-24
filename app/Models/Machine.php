<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    //
    protected $table = 'machine';

    // 获取-商品详情轮播
    public function getPicsAttribute($value)
    {
        return json_decode($value, true);
    }

    // 设置-商品详情轮播
    public function setPicsAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['pics'] = json_encode($value);
        }
    }

    // 禁用区内
    const FORBIDDEN_AREA_ENABLE = 1; // 可用
    const FORBIDDEN_AREA_DISABLE = 2; // 禁用
    // 获取禁用区状态
    public static function getForbiddenStatus($ind = null)
    {
        $arr = [
            self::FORBIDDEN_AREA_ENABLE => '可用',
            self::FORBIDDEN_AREA_DISABLE => '禁用',
        ];

        if ($ind !== null) {
            return array_key_exists($ind,$arr) ? $arr[$ind] : $arr[self::FORBIDDEN_AREA_ENABLE];
        }
        return $arr;
    }

    // 国标状态
    const STANDARD_QUALIFIED = 1; // 合格
    const STANDARD_UNQUALIFIED = 2; // 不合格
    // 获取国标状态
    public static function getStandardStatus($ind = null)
    {
        $arr = [
            self::STANDARD_QUALIFIED => '合格',
            self::STANDARD_UNQUALIFIED => '不合格',
        ];

        if ($ind !== null) {
            return array_key_exists($ind,$arr) ? $arr[$ind] : $arr[self::STANDARD_QUALIFIED];
        }
        return $arr;
    }

    // 信息审核状态
    const INFO_STATUS_APPROVED = 1; // 合格
    const INFO_STATUS_UNAPPROVED = 2; // 合格
    // 获取信息审核状态
    public static function getApprovedStatus($ind = null)
    {
        $arr = [
            self::INFO_STATUS_APPROVED => '审核通过',
            self::INFO_STATUS_UNAPPROVED => '审核未通过',
        ];

        if ($ind !== null) {
            return array_key_exists($ind,$arr) ? $arr[$ind] : $arr[self::INFO_STATUS_UNAPPROVED];
        }
        return $arr;
    }
}
