<?php
/**
 * File: RestaurantPhotoObserver.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 20/09/17
 * Time: 00:40
 * Project: la_restaurants
 * Copyright: 2017
 */

namespace App\Observers;


use App\RestaurantPhoto;

class RestaurantPhotoObserver
{
    use UploadObserverTrait;

    protected $field = 'url';
    protected $path = 'restaurant_photo/';

    /**
     * Função que executa ANTES DE CRIAR
     * @param RestaurantPhoto $model
     */
    public function creating(RestaurantPhoto $model)
    {
        $this->sendFile($model);
    }

    /**
     * Função que executa ANTES DE DELETAR
     * @param RestaurantPhoto $model
     */
    public function deleting(RestaurantPhoto $model)
    {
        $this->removeFile($model);
    }

    /**
     * Função que executa ANTES DE ATUALIZAR
     * @param RestaurantPhoto $model
     */
    public function updating(RestaurantPhoto $model)
    {
        $this->updateFile($model);
    }
}