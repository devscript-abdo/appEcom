<?php
/**
 * Author    : Elmarzougui Abdelghafour (Haymacproduction)
 * website   : https://www.elmarzougui.com
 * linkedin  : https://www.linkedin.com/in/devscript/
 * facebook  : https://www.facebook.com/devscript
 * twitter   : https://twitter.com/devscriptt
 * createdAt : 16/novembre/2020
 **/

namespace App\Repositories\Delivery;


interface DeliveryRepositoryInterface
{

    public function getInstance();

    public function all();

    public function query();

    public function select(array $attributes);

    public function create(array $data);

    public function update(array $data, int $id);

    public function delete(int $id);

    public function destroy($id);

    public function find(int $id);

    public function findOrFail(int $id);

    public function with(array $relations);

    public function paginate(int $page);


}
