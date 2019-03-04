<?php

namespace app\components;

use app\models\Category;
use function is_int;
use const null;
use function ob_get_clean;
use function ob_start;
use const SORT_ASC;
use const SORT_DESC;
use function sprintf;
use Yii;
use yii\base\UnknownPropertyException;
use yii\base\Widget;

class CategoriesWidget extends Widget
{
    public $sort_type;
    public $offset;

    public function init()
    {
        parent::init();
        switch ($this->sort_type) {
            case SORT_ASC:
                break;
            case SORT_DESC:
                break;
            case null:
                $this->sort_type = SORT_ASC;
                break;
            default:
                Yii::$app->errorHandler->logException(new UnknownPropertyException('Error property'));
                throw new UnknownPropertyException('Error property');
        }
        if (!isset($this->offset)) {
            $this->offset = 0;
        }
        if (!is_int($this->offset)) {
            Yii::$app->errorHandler->logException(new UnknownPropertyException('Error property'));
            throw new UnknownPropertyException('Error property');
        }
    }

    public function run()
    {
        $cache = Yii::$app->cache;
        if ($menu_html = $cache->get('menu_categories')) {
            return $menu_html;
        }
        $categories = Category::find()
            ->orderBy(['title' => $this->sort_type])
            ->offset($this->offset)
            ->limit(6)
            ->asArray()
            ->all();
        $categories = $this->prepareCats($categories);
        $menu_html = $this->catToTamplate($categories);
        $wrap_menu_html = $this->wrapContent($menu_html);
        $cache->set('menu_categories', $wrap_menu_html);
        return $wrap_menu_html;
    }

    protected function catToTamplate($categories)
    {
        ob_start();
            include __DIR__ . '/menu/categories.php';
        return ob_get_clean();
    }

    protected function wrapContent($html_content)
    {
        ob_start();
            include __DIR__ . '/menu/categories_wrap.php';
        $content = ob_get_clean();
        return sprintf($content, $html_content);
    }

    protected function prepareCats($cats)
    {
        $categories = [];
        $element_number = 0;
        foreach ($cats as $key => $category) {
            if ($key != 0 && $key % 3 == 0) {
                ++$element_number;
            }
            $categories[$element_number][] = $category;
        }
        return $categories;
    }

}