<?php

use yii\helpers\Url;
use yii\helpers\Html;
use Highlight\Highlighter;

/* @var $this yii\web\View */

$highlighter = new Highlighter();
$this->title = Yii::$app->name;
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <div class="col-12">
                <div class="page-header">
                    <h1><?= $this->title ?> task</h1>
                </div>
                <div class="well">
                    <p> Ссылка на репозиторий:
                        <a href="https://github.com/superrosko/regru-yii2">superrosko/regru-yii2</a></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="page-header">
                    <h2>Task 1</h2>
                </div>
                <div class="well">
                    <p>Используя Yii2 необходимо реализовать форму регистрации пользователя с условием типа
                        физ./юр.
                        лицо.</p>
                    <p>Для физ. лица необходимо заполнить: почту, ФИО и в случае ИП - ИНН, а для юр. лица:
                        почту,
                        ФИО, название организации и инн.</p>
                    <p>Внешний вид значения не имеет.</p>
                </div>
                <div class="page-header">
                    <h2>Solution</h2>
                </div>
                <div class="well">
                    <p>Создано 2 формы с выбором физ./юр. лица, переключение по табам.</p>
                    <p>В зависимости от выбора, в каждой форме есть скрытый параметр type с boolean 0/1 физ./юр.
                        лицо
                        соответственно</p>
                    <p>Валидация ИНН и Организации проходит на сервере.</p>
                    <p>Страница с формой регистрации:
                        <?= Html::a('Signup', Url::to(['/site/signup']), ['class' => "btn btn-xs btn-link"]) ?></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="page-header">
                    <h2>Task 2</h2>
                </div>
                <div class="well">
                    <p>Реализовать кеширование для функции:</p>
                    <?php
                    $codeTask2 = '<?php
function ($date, $type)
{
    $userId = Yii::$app->user->id;
    $dataList = SomeDataModel::find()
                        ->where([\'date\' => $date, \'type\' => $type, \'user_id\' => $userId])
                        ->all();
    $result = [];
    if (!empty($dataList)) {
        foreach ($dataList as $dataItem) {
            $result[$dataItem->id] = [\'a\' => $dataItem->a, \'b\' => $dataItem->b];
        }
    }
    return $result;
}';
                    try {
                        $highlighted = $highlighter->highlight('php', $codeTask2);
                        echo "<pre><code class=\"hljs {$highlighted->language}\">";
                        echo $highlighted->value;
                        echo "</code></pre>";
                    } catch (Exception $e) {
                        echo "<pre><code>";
                        echo $codeTask2;
                        echo "</code></pre>";
                    }
                    ?>

                </div>
                <div class="page-header">
                    <h2>Solution</h2>
                </div>
                <div class="well">
                    <?php
                    $codeSolution2 = 'public static function getSomeData($date, $type)
{
    $cache = Yii::$app->cache;

    $userId = Yii::$app->user->id;

    /* Ключ для кеша */
    $key = $userId . \'-\' . $date . \'-\' . $type;

    /* Запрашиваем данные по ключу из кеша */
    $result = $cache->get($key);

    /* Проверяем, вернулись ли данные из кеша */
    if ($result === false) {
        $dataList = SomeDataModel::find()
            ->where([\'date\' => $date, \'type\' => $type, \'user_id\' => $userId])
            ->all();

        $result = [];

        if (!empty($dataList)) {
            foreach ($dataList as $dataItem) {
                $result[$dataItem->id] = [\'a\' => $dataItem->a, \'b\' => $dataItem->b];
            }
        }
        /* Т.к. данных в кеше не было, то мы их запросили в базе данных и сохраняем к кеш */
        $cache->set($key, $result);
    }
    return $result;
}';
                    try {
                        $highlighted = $highlighter->highlight('php', $codeSolution2);
                        echo "<pre><code class=\"hljs {$highlighted->language}\">";
                        echo $highlighted->value;
                        echo "</code></pre>";
                    } catch (Exception $e) {
                        echo "<pre><code>";
                        echo $codeSolution2;
                        echo "</code></pre>";
                    }
                    ?>
                    <p>
                        Ссылка на код функции:
                        <a href="https://github.com/superrosko/regru-yii2/blob/71ef8ccb4eabb6c7e5e0d0c0e1e8db222cc40f57/frontend/models/SomeDataModel.php#L27">
                            getSomeData
                        </a>
                    </p>
                    <p>Реализовано не через getOrSet, чтобы минимально менять код функции и не через кеширование
                        запросов, чтобы закешировать уже результирующий массив.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="page-header">
                    <h2>Task 3</h2>
                </div>
                <div class="well">
                    <p>Схематично описать структуру таблиц для хранения информации о медикаментах со следующими
                        требованиями: лекарство имеет название, срок годности и список болезней, при которых это
                        лекарство можно применять. </p>
                </div>
                <div class="page-header">
                    <h2>Solution</h2>
                </div>
                <div class="well">
                    <p><img src="/images/regru_task3_schema.png" alt="regru_task3_schema" class="page-image"></p>
                    <p>Создано 4 миграции для 4х таблиц.</p>
                    <p>Таблица medicines - хранит названия лекарств.</p>
                    <p>Таблица disease - хранит названия болезней.</p>
                    <p>Таблица medicines_disease - хранит связи между medicines и disease, т.к. одно лекарство может
                        лечить несколько болезней (сделано такое предположение) и наоборот.</p>
                    <p>Таблица medicines_stock - хранит связь с medicines и срок годности (сделано предположение что это
                        склад medicines).</p>
                </div>
            </div>
        </div>
    </div>
</div>
