<?php

namespace BasicDashboard\Foundations\Domain\Base\Repositories;

/**
 * An interface for BaseRepository class.
 *
 * @author Nay Ba La
 * @copyright (c) 2022 - Zote Innovation, All Right Reserved.
 */
interface BaseRepositoryInterface
{
    /**
     * Creates a row.
     *
     * @param array $params
     * @param bool $useModel
     * @return mixed
     * @throws DbErrorException
     */
    public function insert(array $params, $useModel = false);

    /**
     * Creates a row and then returns a primary ID of created record.
     *
     * @param array $params
     * @param bool $useModel
     * @return mixed
     * @throws QueryException
     */
    public function insertGetId(array $params, $useModel = false);

    /**
     * Fetch data with pagination.
     *
     * @param array $params
     * @return mixed
     * @throws QueryException
     */
    public function getAll(array $request);

    /**
     * Updates a row that corresponds to the ID.
     *
     * @param $id
     * @param array $params
     * @return mixed
     * @throws DbErrorException
     */
    public function update(array $params, $id);

    /**
     * Deletes a row that corresponds to the ID.
     *
     * @param $id
     * @return mixed
     * @throws DbErrorException
     */
    public function delete($id);
}