<?php

/**
 * This file is part of prooph/event-store.
 * (c) 2014-2021 Alexander Miertsch <kontakt@codeliner.ws>
 * (c) 2015-2021 Sascha-Oliver Prolic <saschaprolic@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Prooph\EventStore\Async\UserManagement;

use Amp\Promise;
use Prooph\EventStore\Exception\UserCommandFailed;
use Prooph\EventStore\UserCredentials;
use Prooph\EventStore\UserManagement\UserDetails;

interface UsersManager
{
    /** @return Promise<void> */
    public function enableAsync(string $login, ?UserCredentials $userCredentials = null): Promise;

    /** @return Promise<void> */
    public function disableAsync(string $login, ?UserCredentials $userCredentials = null): Promise;

    /** @throws UserCommandFailed */
    public function deleteUserAsync(string $login, ?UserCredentials $userCredentials = null): Promise;

    /** @return Promise<list<UserDetails>> */
    public function listAllAsync(?UserCredentials $userCredentials = null): Promise;

    /** @return Promise<UserDetails> */
    public function getCurrentUserAsync(?UserCredentials $userCredentials = null): Promise;

    /** @return Promise<UserDetails> */
    public function getUserAsync(string $login, ?UserCredentials $userCredentials = null): Promise;

    /**
     * @param list<string> $groups
     * @return Promise<void>
     */
    public function createUserAsync(
        string $login,
        string $fullName,
        array $groups,
        string $password,
        ?UserCredentials $userCredentials = null
    ): Promise;

    /**
     * @param list<string> $groups
     * @return Promise<void>
     */
    public function updateUserAsync(
        string $login,
        string $fullName,
        array $groups,
        ?UserCredentials $userCredentials = null
    ): Promise;

    /** @return Promise<void> */
    public function changePasswordAsync(
        string $login,
        string $oldPassword,
        string $newPassword,
        ?UserCredentials $userCredentials = null
    ): Promise;

    /** @return Promise<void> */
    public function resetPasswordAsync(
        string $login,
        string $newPassword,
        ?UserCredentials $userCredentials = null
    ): Promise;
}
