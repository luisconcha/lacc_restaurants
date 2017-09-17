<?php
/**
 * File: ApiController.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 10/09/17
 * Time: 23:10
 * Project: la_restaurants
 * Copyright: 2017
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

trait ApiControllerTrait
{
    /**
     * Filtra os dados com base a uma query string
     * Ex:
     * ?limit=15
     * ?order=created_at,desc
     * ?where[id]=2
     * ?like[name]=luis
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $limite = empty($data['limite']) ? 20 : $data['limite'];
        $order = empty($data['order']) ? null : $data['order'];

        if ($order !== null) {
            $order = explode(',', $order);
        }

        $order[0] = empty($order[0]) ? 'id' : $order[0];
        $order[1] = empty($order[1]) ? 'asc' : $order[1];

        $where = empty($data['where']) ? [] : $data['where'];

        $like = null;

        if (!empty($data['like']) and is_array($data['like'])) {
            $like = $data['like'];

            $key = key(reset($like));
            $like[0] = $key;
            $like[1] = '%' . $like[$key] . '%';
        }


        $results = $this->model
            ->orderBy($order[0], $order[1])
            ->where(function ($query) use ($like) {
                if ($like) {
                    return $query->where($like[0], 'like', $like[1]);
                }
                return $query;
            })
            ->where($where)
            ->with($this->relationships())
            ->paginate($limite);

        return response()->json($results);
    }

    public function show($id)
    {
        $result = $this->model
            ->with($this->relationships())
            ->findOrFail($id);

        return response()->json($result);
    }

    public function store(Request $request)
    {
        $this->validate($request, !empty($this->rules) ? $this->rules : [], !empty($this->messages) ? $this->messages : []);
        
        $result = $this->model->create($request->all());

        return response()->json($result);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, !empty($this->rules) ? $this->rules : [], !empty($this->messages) ? $this->messages : []);
        $result = $this->model->findOrFail($id);
        $result->update($request->all());

        return response()->json($result);
    }

    public function destroy($id)
    {
        $result = $this->model->findOrFail($id);
        $result->delete();

        return response()->json($result);
    }


    protected function relationships()
    {
        if (isset($this->relationships)) {
            return $this->relationships;
        }

        return [];
    }
}