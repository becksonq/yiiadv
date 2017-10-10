<?php
/**
 * User: Администратор
 * Date: 09.10.2017
 * Time: 22:05
 */

namespace common\components\CarouselWidget;


use yii\base\Widget;

class CarouselWidget extends Widget
{
    public $carouselId = 'carouselWidget_0';
    public $options = [ ];
    public $models = [ ];
    private $carouselItemsContent;

    public function init()
    {
        // It is not necessary because yii bootstrap Carousel widget will load it automatically
        // \yii\jui\JuiAsset::register($this->getView());
        $this->carouselItemsContent = [ ];

        foreach ( $this->models as $model ) {
            $caption = sprintf( '<h1>Room #%d</h1>', $model->id );
            $content = sprintf( 'This is room #%d at floor %d with %0.2f€ price per day', $model->id, $model->floor,
                $model->price_per_day );
            $itemContent = [
                'content' => $content,
                'caption' => $caption
            ];
            $this->carouselItemsContent[] = $itemContent;
        }
    }

    public function run()
    {
        return $this->render( 'carousel', [ 'carouselItemsContent' => $this->carouselItemsContent ] );
    }
}