<?php

namespace BasicDashboard\Foundations\Domain\Base\Repositories\Eloquent;

use Carbon\Carbon;
use BasicDashboard\Foundations\Domain\Base\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

/**
 * A Base repository class.
 *
 * @author Nay Ba La
 * All Right Reserved.
 */
class BaseRepository implements BaseRepositoryInterface
{
    /**
     * model
     *
     * @var mixed
     */
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Retrieve a connection of eloquent.
     * It should be called by all functions
     *
     * @param bool $useModel A flag that use $model instead of $relation forcibly, when it is passed as true.
     * @param bool $forInsert only adminRelation is returned when true is passed.
     * @return mixed
     */
    public function connection($useModel = false)
    {
        if ($useModel) {
            return $this->model;
        }

        return $this->model;
    }

    /**
     * Creates a row.
     *
     * @param array $params
     * @param bool $useModel
     * @return mixed
     * @throws DbErrorException
     */
    public function insert(array $params, $useModel = false)
    {
        $params['created_by'] = auth()->user()->id;
        $params['created_at'] = Carbon::now();
        $query = $this->connection($useModel)->create($params);

        if (!$query) {
            throw new QueryException("Inserting a row was failed.",[], $query);
        }

        return $query;
    }

    public function getAll($request)
    {
        $request = 10;
        $query = $this->connection(true)
            ->orderByRaw('
                CASE
                WHEN updated_at IS NULL THEN created_at
                ELSE updated_at
                END
                DESC')
            ->orderBy('id', 'desc')
            ->paginate($request);
        if (!$query) {
            throw new QueryException("Inserting a row was failed.",[], $query);
        }
        return $query;
    }

    /**
     * Creates a row and then returns a primary ID of created record.
     *
     * @param array $params
     * @param bool $useModel
     * @return mixed
     * @throws QueryException
     */
    public function insertGetId(array $params, $useModel = false)
    {
        $query = $this->insert($params, $useModel);
        return $query['id'];
    }

    public function edit($id)
    {
        $query = $this->connection(true)
            ->where('id', $id)
            ->first();
        if (!$query) {
            throw new QueryException("Inserting a row was failed.",[], $query);
        }

        return $query;
    }
   

    /**
     * Updates a row that corresponds to the ID.
     *
     * @param $id
     * @param array $params
     * @return mixed
     * @throws DbErrorException
     */
    public function update(array $params, $id)
    {
        $params['updated_by'] = auth()->user()->id;
        $params['updated_at'] = Carbon::now();
        $query = $this->connection(true)
            ->where('id', $id)
            ->update($params);
        return $query;
    }

    /**
     * Deletes a row that corresponds to the ID.
     *
     * @param $id
     * @return mixed
     * @throws DbErrorException
     */
    public function delete($id)
    {
        $this->connection(true)
            ->where('id', $id)
            ->update(['deleted_by' => auth()->user()->id]);

        $query = $this->connection(true)->destroy($id);

        if (!$query) {
            throw new QueryException("Inserting a row was failed.",[], $query);
        }

        return $query;
    }
    
    /**
     * Begin DB transaction.
     */
    public function beginTransaction()
    {
        DB::beginTransaction();
    }

    /**
     * DB transaction rollback.
     */
    public function rollback()
    {
        DB::rollback();
    }

    /**
     * DB transaction commit.
     */
    public function commit()
    {
        DB::commit();
    }
}