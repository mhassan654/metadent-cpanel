<?php
declare(strict_types=1);
namespace App\Modules\Examples;

class ExamplesService
{
    private ExamplesValidator $validator;
    private ExamplesRepository $repository;

    public function __construct(
        ExamplesValidator $validator,
        ExamplesRepository $repository
    )
    {
        $this->validator = $validator;
        $this->repository = $repository;
    }

    public function get(int $id): Examples
    {
        return $this->repository->get($id);
    }

    public function getByCourseId(int $courseId) : array
    {
        return $this->repository->getByCourseId($courseId);
    }

    public function update(array $data) : Examples
    {
        $this->validator->validateUpdate($data);
        return $this->repository->update(
            ExamplesMapper::mapFrom($data)
        );
    }

    public function softDelete(int $id): bool
    {
        return $this->repository->softDelete($id);
    }

}
