<?php

namespace App\Repositories\Admin;

class AdminCacheRepository implements AdminRepositoryInterface
{
    protected $repo;

    protected $cache;

    const TTL = 1440; # 1 day

    public function __construct($cache, $repo)
    {
        $this->repo = $repo;
        $this->cache = $cache;

    }

    public function  getInstance(){
        
    }
    public function query()
    {
        return $this->repo->query();
    }

    public function with($relation)
    {
        return $this->repo->query()->with($relation);
    }

    public function getAll()
    {
        return $this->cache->remember('admins', self::TTL, function () {
            return $this->repo->getAll();
        });
    }

    public function findOrFail($id)
    {

        return $this->cache->remember('admin.' . $id, self::TTL, function () use ($id) {
            return $this->repo->findOrFail($id);
        });
    }



    public function getAdmin($id)
    {
    }

    public function create(array $attributes)
    {
    }

    public function createWithRole(array $attributes)
    {
    }

    public function update(array $attributes, $id)
    {
        $admin = $this->repo->findOrFail($id);
		if ($admin) {
			$admin->update($attributes);
			//$admin->assignRole($attributes['role']);
			return 	true;
		}
		return false;
    }

    public function deleteAdmin($id)
    {
    }
}
