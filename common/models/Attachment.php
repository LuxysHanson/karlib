<?php

namespace common\models;

use common\components\ActiveRecord;
use common\enums\AttachmentsEnum;
use yii\web\UploadedFile;

/**
 * Class Attachment
 * @package common\models
 * @property int $id
 * @property int $type
 * @property int $relative_type
 * @property int $relative_id
 * @property string $source
 * @property string $ts
 * @property boolean $published
 */
class Attachment extends ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $image;

    public static function tableName()
    {
        return 'attachments';
    }

    public function rules()
    {
        return [
            [['type', 'relative_type', 'relative_id', 'source'], 'required'],
            [['type', 'relative_type', 'relative_id'], 'integer'],
            ['source', 'string'],
            ['type', 'in', 'range' => array_keys(AttachmentsEnum::types())],
            ['relative_type', 'in', 'range' => array_keys(AttachmentsEnum::relations())],
            ['published', 'boolean'],
        ];
    }

    public function getRenderTemplate()
    {
        switch ($this->type) {
            case AttachmentsEnum::TYPE_IMAGE:
                return '@common/views/attachments/_image';
            case AttachmentsEnum::TYPE_VIDEO:
                return '@common/views/attachments/_video';
            default:
                return '@common/views/attachments/_default';
        }
    }

    public function delete()
    {
        if ($this->type == AttachmentsEnum::TYPE_IMAGE) {
            $file = $this->getSource();
            if (file_exists($file)) {
                unlink($file);
            }
        }
        return parent::delete();
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            if (in_array($this->relative_type, [
                AttachmentsEnum::RELATION_LIBRARY_LOGO,
                AttachmentsEnum::RELATION_AUTH_BLOCK_BACKGROUND,
                AttachmentsEnum::RELATION_SMART_SPACES_MAP
            ])) {
                $model = self::find()->where(['relative_type' => $this->relative_type])->one();
                if ($model) {
                    $model->delete();
                }
            }
            if ($this->relative_type == AttachmentsEnum::RELATION_SMART_SPACE) {
                $model = self::find()->where(['relative_type' => $this->relative_type])
                    ->andWhere(['relative_id' => $this->relative_id])
                    ->one();
                if ($model) {
                    $model->delete();
                }
            }
        }

        return parent::beforeSave($insert);
    }

    public function getSource()
    {
        return \Yii::getAlias('@library') . $this->source;
    }

    public function attributeLabels()
    {
        return [
            'published' => \Yii::t('app', '????????????????????????'),
            'type' => \Yii::t('app', '??????'),
            'relative_type' => \Yii::t('app', '?????? ?????????????????? ????????????'),
            'relative_id' => \Yii::t('app', '?????????????????? ????????????'),
            'source' => \Yii::t('app', '????????????????'),
        ];
    }
}