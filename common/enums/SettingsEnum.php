<?php

namespace common\enums;

use common\components\Enum;

class SettingsEnum extends Enum
{
    const LIBRARY_BRAND_LABEL = 101;
    const LIBRARY_SPACE_INFO = 102;
    const LIBRARY_FOND_INFO = 103;
    const LIBRARY_SOCIAL_VIBER = 111;
    const LIBRARY_SOCIAL_TELEGRAM = 112;
    const LIBRARY_SOCIAL_FACEBOOK = 113;
    const LIBRARY_SOCIAL_TWITTER = 114;
    const LIBRARY_SOCIAL_VK = 115;
    const LIBRARY_SOCIAL_OK = 116;
    const LIBRARY_SOCIAL_YOUTUBE = 117;
    const LIBRARY_CONTACTS_EMAIL = 118;
    const LIBRARY_CONTACTS_PHONE = 119;
    const LIBRARY_CONTACTS_ADDRESS = 120;
    const LIBRARY_MAP_HEIGHT = 121;
    const LIBRARY_MAP_WIDTH = 122;

    public static function labels()
    {
        return [
            self::LIBRARY_BRAND_LABEL => \Yii::t('app', 'Название лейбла портала'),
            self::LIBRARY_SPACE_INFO => \Yii::t('app', 'Информация о пространстве библиотеки'),
            self::LIBRARY_FOND_INFO => \Yii::t('app', 'Информация о фонде библиотеки'),
            self::LIBRARY_SOCIAL_VIBER => \Yii::t('app', 'Viber'),
            self::LIBRARY_SOCIAL_TELEGRAM => \Yii::t('app', 'Telegram'),
            self::LIBRARY_SOCIAL_FACEBOOK => \Yii::t('app', 'Facebook'),
            self::LIBRARY_SOCIAL_TWITTER => \Yii::t('app', 'Twitter'),
            self::LIBRARY_SOCIAL_VK => \Yii::t('app', 'ВКонтакте'),
            self::LIBRARY_SOCIAL_OK => \Yii::t('app', 'Одноклассники'),
            self::LIBRARY_SOCIAL_YOUTUBE => \Yii::t('app', 'YouTube'),
            self::LIBRARY_CONTACTS_EMAIL => \Yii::t('app', 'Электронная почта'),
            self::LIBRARY_CONTACTS_PHONE => \Yii::t('app', 'Контактный телефон'),
            self::LIBRARY_CONTACTS_ADDRESS => \Yii::t('app', 'Адрес'),
            self::LIBRARY_MAP_HEIGHT => \Yii::t('app', 'Долгота метки в карте'),
            self::LIBRARY_MAP_WIDTH => \Yii::t('app', 'Широта метки в карте'),
        ];
    }

    public static function socialLinks()
    {
        return [
            self::LIBRARY_SOCIAL_VIBER => \Yii::t('app', 'Viber'),
            self::LIBRARY_SOCIAL_TELEGRAM => \Yii::t('app', 'Telegram'),
            self::LIBRARY_SOCIAL_FACEBOOK => \Yii::t('app', 'Facebook'),
            self::LIBRARY_SOCIAL_TWITTER => \Yii::t('app', 'Twitter'),
            self::LIBRARY_SOCIAL_VK => \Yii::t('app', 'ВКонтакте'),
            self::LIBRARY_SOCIAL_OK => \Yii::t('app', 'Одноклассники'),
            self::LIBRARY_SOCIAL_YOUTUBE => \Yii::t('app', 'YouTube'),
        ];
    }

    public static function library()
    {
        return [

        ];
    }

    public static function archive()
    {
        return [

        ];
    }
}