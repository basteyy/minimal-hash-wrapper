<?php

declare(strict_types=1);

namespace basteyy\MinimalHashWrapper;

class MinimalHashWrapper
{
    /**
     * @var int $cryptCost Option cost of the crypt algorithm
     */
    private static int $cryptCost = 11;

    /**
     * @var string $cryptAlgo The selected algorithm
     */
    private static string $cryptAlgo = PASSWORD_BCRYPT;

    /**
     * Creates the hash for `$password`.
     * @param string $password
     * @return string
     */
    static public function getHash(string $password): string
    {
        return password_hash($password,
            self::$cryptAlgo,
            [
                match (self::$cryptAlgo) {
                    PASSWORD_BCRYPT => 'cost',
                    PASSWORD_ARGON2I => 'time_cost'
                } => self::$cryptCost
            ]);
    }

    /**
     * Compares `$password` against a hash `$hash`
     * @param string $password
     * @param string $hash
     * @return bool
     */
    static public function compare(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }

    /**
     * Change the cost options
     * @param int $cost
     */
    static public function setCryptCost(int $cost): void
    {
        self::$cryptCost = $cost;
    }

    /**
     * Return the current cost
     * @return int
     */
    static public function getCost(): int
    {
        return self::$cryptCost;
    }

    /**
     * Change the algorithm for hashing
     * @param string $algo
     */
    static public function setAlgorithm(string $algo): void
    {
        self::$cryptAlgo = $algo;
    }

    /**
     * Return the current algorithm
     * @return string
     */
    static public function getAlgorithm(): string
    {
        return self::$cryptAlgo;
    }

}