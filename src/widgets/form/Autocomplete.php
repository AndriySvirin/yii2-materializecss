<?php

namespace macgyer\yii2materializecss\widgets\form;

use yii\helpers\Json;
use yii\helpers\Html;
use yii\web\JsExpression;

/**
 * Autocomplete class.
 */
class Autocomplete extends \yii\base\Widget
{

    /**
     * Element options.
     * @var array 
     */
    public $options = [];

    /**
     * Widget options.
     * @var array 
     */
    public $clientOptions = [];

    /**
     * {inheritDoc}
     */
    public function init()
    {
        $id = $this->getId();
        $this->clientOptions['appendTo'] = new JsExpression('jQuery("#wrapper-' . $id . '")');
        parent::init();
    }

    /**
     * {inheritDoc}
     */
    public function getId($autoGenerate = true)
    {
        if (isset($this->options['id'])) {
            return $this->options['id'];
        }
        return parent::getId($autoGenerate);
    }

    /**
     * {inheritDoc}
     */
    public function run()
    {
        $id = $this->getId();
        $options = empty($this->clientOptions) ? '' : Json::encode($this->clientOptions);
        $this->getView()->registerJs(''
            . 'jQuery(document).mouseup(function (e) {'
            . '  var container = jQuery("#wrapper-' . $id . ' .autocomplete-suggestions");
                  if (container.has(e.target).length === 0){container.hide();}
               });
            jQuery(document).keydown(function (e) {
                var container = $("#wrapper-' . $id . ' .autocomplete-suggestions");
                if (e.which === 27){container.hide();}   
            });
            jQuery("#' . $id . '").autocomplete(' . $options . ');');
        return Html::tag('div', Html::textInput('', '', array_merge($this->options, ['id' => $id, 'class' => 'form-control']))
                , ['id' => 'wrapper-' . $id]);
    }
}
