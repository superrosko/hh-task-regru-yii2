<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * SomeDataModel model
 * @property integer $id
 * @property string $a
 * @property string $b
 * @property integer $date
 * @property integer $type
 * @property integer $user_id
 */
class SomeDataModel extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%somedata}}';
    }

    public static function getSomeData($date, $type)
    {
        $cache = Yii::$app->cache;

        $userId = Yii::$app->user->id;

        /* Ключ для кеша */
        $key = $userId . '-' . $date . '-' . $type;

        /* Запрашиваем данные по ключу из кеша */
        $result = $cache->get($key);

        /* Проверяем, вернулись ли данные из кеша */
        if ($result === false) {
            $dataList = SomeDataModel::find()
                ->where(['date' => $date, 'type' => $type, 'user_id' => $userId])
                ->all();

            $result = [];

            if (!empty($dataList)) {
                foreach ($dataList as $dataItem) {
                    $result[$dataItem->id] = ['a' => $dataItem->a, 'b' => $dataItem->b];
                }
            }
            /* Т.к. данных в кеше не было, то мы их запросили в базе данных и сохраняем к кеш */
            $cache->set($key, $result);
        }
        return $result;
    }
}
