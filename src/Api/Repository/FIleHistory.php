<?php

declare(strict_types=1);

/*
 * This file is part of Bitbucket API Client.
 *
 * (c) Graham Campbell <graham@alt-three.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bitbucket\Api\Repository;

/**
 * The file history api class.
 *
 * @author Graham Campbell <graham@alt-thre.com>
 */
class FileHistory extends AbstractRepositoryApi
{
    /**
     * @param string $node
     * @param string $path
     * @param array  $params
     *
     * @throws \Http\Client\Exception
     *
     * @return array
     */
    public function list(string $node, string $path, array $params = [])
    {
        $path = $this->buildFileHistoryPath($node, ...explode('/', $path));

        return $this->get($path, $params);
    }

    /**
     * Build the file history path from the given parts.
     *
     * @param string[] $parts
     *
     * @throws \Bitbucket\Exception\InvalidArgumentException
     *
     * @return string
     */
    protected function buildFileHistoryPath(string ...$parts)
    {
        return static::buildPath('repositories', $this->username, $this->repo, 'filehistory', ...$parts);
    }
}
