<?php

namespace macgyer\yii2materializecss\widgets;

use macgyer\yii2materializecss\lib\BaseWidget;
use Yii;

/**
 * Alert Toasts renders Yii's session flash messages. 
 * @package widgets
 */
class AlertToast extends BaseWidget
{

    /**
     * Executes the widget.
     */
    public function run()
    {
        $flashes = Yii::$app->session->getAllFlashes();
        foreach ($flashes as $type => $data) {
            $data = (array) $data;
            foreach ($data as $i => $message) {
                $this->view->registerJs('Materialize.toast("' . $message . '", 4000);');
            }
            Yii::$app->session->removeFlash($type);
        }
    }
}
