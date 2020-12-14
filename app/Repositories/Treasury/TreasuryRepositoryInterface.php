<?php
/**
 * Author    : Elmarzougui Abdelghafour (Haymacproduction)
 * website   : https://www.elmarzougui.com
 * linkedin  : https://www.linkedin.com/in/devscript/
 * facebook  : https://www.facebook.com/devscript
 * twitter   : https://twitter.com/devscriptt
 * createdAt : 03/décembre/2020
 **/

namespace App\Repositories\Treasury;


interface TreasuryRepositoryInterface
{

    public function all();

    public function find(int $id);

    public function findOrFail(int $id);

    public function create(array $attributes);

    public function update(array $attributes, $id);

    public function delete(int $id);

    public function paginate($page);

    public function select(array $fields);

    public function with(array $relations);

    public function query();
}
