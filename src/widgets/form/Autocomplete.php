<?php

namespace macgyer\yii2materializecss\widgets\form;

use macgyer\yii2materializecss\lib\BaseInputWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use macgyer\yii2materializecss\assets\AutocompleteAsset;

class Autocomplete extends BaseInputWidget
{
    public $startQuery = true;
    public $wrapperSelector;
    public $url = [];
    public $options = [];

    private $_ajaxUrl;

    public function getUrl()
    {
        if ($this->_ajaxUrl === null) {
            $this->_ajaxUrl = Url::toRoute($this->url);
        }
        return $this->_ajaxUrl;
    }

    public function run(){
        $id = $this->getId();
        $value = $this->model->{$this->attribute};

        $this->getView()->registerJs("
            var cache_{$id} = {};
            var cache_{$id}_1 = {};
            var cache_{$id}_2 = {};
            $('#{$id}').autocomplete({
                 appendTo: $('#{$id}').parent('.wrapper-{$id}'),
                 width: 'auto',
                 lookup: function (request, response) {
                    var term = request;
                    if ( term in cache_{$id} ) {
                        response( cache_{$id} [term] );
                        return;
                    }
                    $.getJSON('{$this->getUrl()}', {term: term}, function( data, status, xhr ) {
                        cache_{$id} [term] = data;
                        console.log(data);
                        response(data);
                    });
                 }, 
                 onSelect: function (suggestion) {
                     $('#{$id}-hidden').val(suggestion.data);
                     $('#{$id}-hidden').change();
                 }
            });
        ");

        return Html::tag('div',
            Html::activeHiddenInput($this->model, $this->attribute, ['id' => $id . '-hidden', 'class' => 'form-control'])
            . ($value && $this->startQuery ? Html::tag('div', "<img src='{$this->registerActiveAssets()}/images/load.gif'/>", ['class' => 'autocomplete-image-load']) : '')
            . Html::textInput('', $value && !$this->startQuery ? $value : '', array_merge($this->options, ['id' => $id, 'class' => 'form-control']))
            , [
                'class' => 'wrapper-' . $id
            ]
        );
    }
}
