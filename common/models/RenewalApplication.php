<?php

namespace common\models;

use common\components\ActiveRecord;

/**
 * Class RenewalApplication
 * @package common\models
 * @property int $id
 * @property int $user_id
 * @property string $full_name
 * @property string $card_number
 * @property string $book_name
 * @property string $email
 * @property string $ts
 */
class RenewalApplication extends ActiveRecord
{
    public static function tableName()
    {
        return 'renewal_applications';
    }

    public function rules()
    {
        return [
            [['user_id', 'full_name', 'card_number', 'book_name', 'email'], 'required'],
            [['full_name', 'card_number', 'book_name'], 'string'],
            ['email', 'email'],
        ];
    }
}