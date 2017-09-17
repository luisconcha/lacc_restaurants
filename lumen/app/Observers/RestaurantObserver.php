<?php
/**
 * File: RestaurantObserver.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 12/09/17
 * Time: 00:19
 * Project: la_restaurants
 * Copyright: 2017
 */

namespace App\Observers;


use App\Restaurant;

class RestaurantObserver
{

    use UploadObserverTrait;

    protected $field = 'photo';
    protected $path = 'restaurant/';

    /**
     * Função que executa ANTES DE CRIAR
     * @param Restaurant $model
     */
    public function creating(Restaurant $model)
    {
        $this->sendFile($model);
    }

    /**
     * Função que executa ANTES DE DELETAR
     * @param Restaurant $model
     */
    public function deleting(Restaurant $model)
    {
        $this->removeFile($model);
    }

    /**
     * Função que executa ANTES DE ATUALIZAR
     * @param Restaurant $model
     */
    public function updating(Restaurant $model)
    {
        $this->updateFile($model);
    }
}